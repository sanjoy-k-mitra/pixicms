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

abstract class RestController extends Controller{

    abstract protected function getEntityClass();

    /*
     * @Route("/")
     * @Method("GET")
     */
    public function index(){
        return new JsonResponse($this->getDoctrine()->getManager()->getRepository($this->getEntityClass())->findAll());
    }

    /*
     * @Route("/{id}")
     * @Method("GET")
     */
    public function item($id){
        return new JsonResponse($this->getDoctrine()->getManager()->getRepository($this->getEntityClass())->find($id));
    }

    /*
     * @Route("/")
     * @Method({"POST","PUT"})
     */
    public function create(){

    }

    /*
     * @Route("/{id}")
     * @Method({"POST","PUT"})
     */
    public function update($id){

    }

    /*
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function delete($id){

    }
}