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
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class RestController extends Controller
{

    protected static $serializer;

    abstract protected function getEntityClass();

    public function __construct()
    {
        if (is_null(RestController::$serializer)) {
            RestController::$serializer = new Serializer(array(new ObjectNormalizer()), array(new JsonEncoder(), new XmlEncoder()));
        }
    }

    /*
     * @Route("/")
     * @Method("GET")
     */
    public function index()
    {
        return RestController::$serializer->serialize($this->getDoctrine()->getManager()->getRepository($this->getEntityClass())->findAll(), 'json');
    }

    /*
     * @Route("/{id}")
     * @Method("GET")
     */
    public function item($id)
    {
        return RestController::$serializer->serialize($this->getDoctrine()->getManager()->getRepository($this->getEntityClass())->find($id), "json");
    }

    /*
     * @Route("/")
     * @Method({"POST","PUT"})
     */
    public function create()
    {

    }

    /*
     * @Route("/{id}")
     * @Method({"POST","PUT"})
     */
    public function update($id)
    {

    }

    /*
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function delete($id)
    {

    }
}