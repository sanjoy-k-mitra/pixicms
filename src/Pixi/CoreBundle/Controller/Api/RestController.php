<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/14/15
 * Time: 3:48 PM
 */

namespace Pixi\CoreBundle\Controller\Api;


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

    protected $ignoredProperties = array("lazyPropertiesDefaults", "__initializer__", "__cloner__", "__isInitialized__", "password", "salt");

    abstract protected function getEntityClass();

    public function __construct()
    {
        $this->normalizer = new ObjectNormalizer();
        $this->normalizer->setIgnoredAttributes($this->ignoredProperties);
        $this->normalizer->setCircularReferenceLimit(1);
        $this->normalizer->setCircularReferenceHandler(function ($object) {
            return array("id" => $object->getId());
        });
        $this->serializer = new Serializer(array($this->normalizer), array(new JsonEncoder(), new XmlEncoder()));
    }

    public function getIgnoredProperties()
    {
        return $this->$ignoredProperties;
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
                        $this->getEntityClass()
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
                    ->getRepository($this->getEntityClass())->find($id)
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

    }

    /**
     * @Route("/{id}")
     * @Method({"POST","PUT"})
     */
    public function update($id)
    {

    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entry = $em->getRepository($this->getEntityClass())->find($id);
        $em->remove($entry);

        return new Response(
            $this->serializer->serialize(
                $entry,
                "json"
            )
        );
    }
}