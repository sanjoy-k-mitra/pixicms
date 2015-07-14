<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/14/15
 * Time: 4:04 PM
 */

namespace Pixi\CoreBundle\Controller\Api;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("api/user")
 */
class UserController extends RestController{

    protected function getEntityClass(){
        return "PixiCoreBundle:User";
    }

    /**
     * @Route("/")
     * @Method("GET")
     */
    public function index(){
        return parent::index();
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function item($id){
        return parent::item($id);
    }

    /**
     * @Route("/")
     * @Method({"POST","PUT"})
     */
    public function create(){

    }

    /**
     * @Route("/{id}")
     * @Method({"POST","PUT"})
     */
    public function update($id){

    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function delete($id){

    }

}