<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/14/15
 * Time: 3:48 PM
 */

namespace Pixi\CoreBundle\Controller\Api;


use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\IndexedReader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Column;
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
    protected $jsonEncoder;
    protected $xmlEncoder;
    protected $annotationReader;

    protected $ignoredProperties = array("lazyPropertiesDefaults", "__initializer__", "__cloner__", "__isInitialized__", "password", "salt");

    abstract protected function getBundleEntity();

    abstract protected function getEntityClass();

    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer();
        $this->normalizer->setIgnoredAttributes($this->ignoredProperties);
        $this->normalizer->setCircularReferenceLimit(1);
        $this->jsonEncoder = new JsonEncoder();
        $this->xmlEncoder = new XmlEncoder();
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
        $this->serializer = new Serializer(array($this->normalizer), array($this->jsonEncoder, $this->xmlEncoder));
        $this->annotationReader = new AnnotationReader();
    }

    /**
     * @return Response
     * @Route("")
     * @Method("OPTIONS")
     */
    public function options(){
        $reflectionClass = new \ReflectionClass($this->getEntityClass());
        $options = array();
        foreach($reflectionClass->getProperties() as $reflectionProperty){
            $name = $reflectionProperty->getName();
            foreach($this->annotationReader->getPropertyAnnotations($reflectionProperty) as $annotation){
                $annotationClass = get_class($annotation);
                if($annotationClass == 'Doctrine\ORM\Mapping\Column'){
                    $columnOptions = $this->serializer->normalize($annotation, "json");
                    break;
                }
                elseif(in_array($annotationClass, array('Doctrine\ORM\Mapping\OneToMany','Doctrine\ORM\Mapping\ManyToMany'))){
                    $columnOptions = $this->serializer->normalize($annotation, "json");
                    $columnOptions['type'] = 'List';
                    break;
                }
                elseif(in_array($annotationClass, array('Doctrine\ORM\Mapping\ManyToOne','Doctrine\ORM\Mapping\OneToOne'))){
                    $columnOptions = $this->serializer->normalize($annotation, "json");
                    $columnOptions['type'] = 'Object';
                    break;
                }
            }
            if(empty($columnOptions['name'])){
                $columnOptions['name'] = $name;
            }
            if(!empty($columnOptions['targetEntity'])){
                $targetClass = $columnOptions['targetEntity'];
                if(strpos($columnOptions['targetEntity'],'\\') == null){
                    $targetClass = $reflectionClass->getNamespaceName()."\\".$targetClass;
                }
                $targetReflectionClass = new \ReflectionClass($targetClass);
                $selects = "te.id".($targetReflectionClass->hasProperty("name") ? ", te.name" : "")
                    .($targetReflectionClass->hasProperty("displayName")? ", te.displayName" : "");
                $columnOptions['options'] = $this->getDoctrine()->getEntityManager()->createQueryBuilder()
                    ->select($selects)
                    ->from($targetClass, "te")
                    ->getQuery()
                    ->getArrayResult();
            }
            array_push($options, $columnOptions);
        }
        $response = new Response($this->serializer->serialize($options,"json"));
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }

    /**
     * @Route("")
     * @Method("GET")
     */
    public function index()
    {
        $offset = $this->get('request')->get('offset');
        $limit = $this->get('request')->get('limit');
        $order = $this->get('request')->get('order') == null ? array() : $this->get('request')->get('order');
//        $query = $this->get('request')->get('query') == null ? array() : $this->get('request')->get('query');
        $response = new Response(
            $this->serializer->serialize(
                $this->getDoctrine()->getManager()
                    ->getRepository(
                        $this->getBundleEntity()
                    )->findBy(array(), $order, $limit, $offset),
                'json'
            )
        );
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function item($id)
    {
        $response = new Response(
            $this->serializer->serialize(
                $this->getDoctrine()->getManager()
                    ->getRepository($this->getBundleEntity())->find($id)
                , "json"
            )
        );
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }

    /**
     * @Route("")
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
                    try{
                        $contentValue = $content->$propertyName;
                    }catch (\Exception $err){
                        break;
                    }
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
                    try{
                        $contentValue = $content->$propertyName;
                    }catch (\Exception $err){
                        break;
                    }
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
        $response = new Response($this->serializer->serialize($object, 'json'));
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }

    /**
     * @Route("/{id}")
     * @Method({"POST","PUT"})
     */
    public function update($id)
    {
        $em = $this->getDoctrine()->getManager();
        $content = json_decode($this->get("request")->getContent());
        $refClass = new \ReflectionClass($this->getEntityClass());
        $object = $em->getRepository($this->getEntityClass())->find($id);
        foreach($refClass->getProperties() as $refProperty){
            $propertyName = $refProperty->getName();
            if(empty($content->$propertyName)){
                continue;
            }
            foreach($this->annotationReader->getPropertyAnnotations($refProperty) as $annotation){
                if ($annotation instanceof OneToMany || $annotation instanceof ManyToMany) {
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
                    $contentValue = $content->$propertyName;
                    $targetEntity = $annotation->targetEntity;
                    if (strstr($targetEntity, "\\") == false) {
                        $targetEntity = $refClass->getNamespaceName() . "\\" . $targetEntity;
                    }
                    $targetRepository = $em->getRepository($targetEntity);
                    $dbValue = $targetRepository->find($contentValue->id);
                    $content->$propertyName = $dbValue;
                    break;
                }else{
                    $methodName = "set".ucfirst($propertyName);
                    if($refClass->hasMethod($methodName)){
                        $setter = $refClass->getMethod($methodName);
                        $setter->invoke($object, $content->$propertyName);
                    }
                }
            }
        }

//        $object = $this->normalizer->denormalize($content, $this->getEntityClass(), "json");
        $em->persist($object);
        $em->flush();
        $response = new Response($this->serializer->serialize($object, "json"));
        $response->headers->set("Content-Type", "application/json");
        return $response;
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
        $response =  new Response(
            $this->serializer->serialize(
                $entry,
                "json"
            )
        );
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }
}