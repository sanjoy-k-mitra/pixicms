<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/14/15
 * Time: 3:48 PM
 */

namespace Pixi\CoreBundle\Controller\Api;


use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\IndexedReader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Pixi\CoreBundle\Utils\JsonEncode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class RestController
 * @package Pixi\CoreBundle\Controller\Api
 * @Route("/api/rest/example")
 */
abstract class RestController extends Controller
{
    protected $serializer;
    protected $normalizer;
    protected $annotationReader;

    protected $ignoredProperties = array("lazyPropertiesDefaults", "__initializer__", "__cloner__", "__isInitialized__", "password", "salt");

    abstract protected function getBundleEntity();

    abstract protected function getEntityClass();

    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer();
        $this->normalizer->setIgnoredAttributes($this->ignoredProperties);
        $this->normalizer->setCircularReferenceLimit(1);
        $this->normalizer->setCircularReferenceHandler(function ($object) {
            return array("id" => $object->getId());
        });
        $dateTimeCallback = function ($dateTime) {
            return $dateTime instanceof \DateTime ? $dateTime->format(\DateTime::ISO8601) : '';
        };
        $this->normalizer->setCallbacks(array(
            'created' => $dateTimeCallback,
            'updated' => $dateTimeCallback
        ));
        $this->serializer = new Serializer(array($this->normalizer), array(new JsonEncoder(), new XmlEncoder()));
        $this->annotationReader = new AnnotationReader();
    }

    /**
     * @Route("/")
     * @Method("GET")
     */
    public function index()
    {
        return new Response(
            $this->serializer->serialize(
                $this->getDoctrine()->getManager()
                    ->getRepository(
                        $this->getBundleEntity()
                    )->findAll(),
                'json'
            )
        );
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function item($id)
    {
        return new Response(
            $this->serializer->serialize(
                $this->getDoctrine()->getManager()
                    ->getRepository($this->getBundleEntity())->find($id)
                , "json"
            )
        );
    }

    /**
     * @Route("/")
     * @Method({"POST","PUT"})
     */
    public function create()
    {
        $em = $this->getDoctrine()->getManager();
        $content = json_decode($this->get("request")->getContent());
        $refClass = new \ReflectionClass($this->getEntityClass());
        foreach ($refClass->getProperties() as $refProperty) {
            $annotations = $this->annotationReader->getPropertyAnnotations($refProperty);
            foreach ($annotations as $annotation) {
                if ($annotation instanceof OneToMany || $annotation instanceof ManyToMany) {
                    $propertyName = $refProperty->getName();
                    $contentValue = $content->$propertyName;
                    $targetEntity = $annotation->targetEntity;
                    if (strstr($targetEntity, "\\") == false) {
                        $targetEntity = $refClass->getNamespaceName() . "\\" . $targetEntity;
                    }
                    $targetRepository = $em->getRepository($targetEntity);
                    $dbValues = array();
                    foreach($contentValue as $value){
                        $dbVal = $targetRepository->find($value->id);
                        array_push($dbValues, $dbVal);
                    }
                    $content->$propertyName = $dbValues;
                    break;
                } elseif ($annotation instanceof OneToOne || $annotation instanceof ManyToOne) {
                    $propertyName = $refProperty->getName();
                    $contentValue = $content->$propertyName;
                    $targetEntity = $annotation->targetEntity;
                    if (strstr($targetEntity, "\\") == false) {
                        $targetEntity = $refClass->getNamespaceName() . "\\" . $targetEntity;
                    }
                    $targetRepository = $em->getRepository($targetEntity);
                    $dbValue = $targetRepository->find($contentValue->id);
                    $content->$propertyName = $dbValue;
                    break;
                }
            }
        }
        $object = $this->normalizer->denormalize($content, $this->getEntityClass(), "json");

        $em->persist($object);
        $em->flush();
        return new Response($this->serializer->serialize($object, 'json'));
    }

    /**
     * @Route("/{id}")
     * @Method({"POST","PUT"})
     */
    public function update($id)
    {
        $content = $this->get("request")->getContent();
        $object = $this->serializer->deserialize($content, $this->getBundleEntity(), "json");
        $this->getDoctrine()->getManager()->persist($object);
    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entry = $em->getRepository($this->getBundleEntity())->find($id);
        $em->remove($entry);
        $em->flush();
        return new Response(
            $this->serializer->serialize(
                $entry,
                "json"
            )
        );
    }
}