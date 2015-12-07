<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 12/7/15
 * Time: 3:40 PM
 */

namespace Pixi\IHTBundle\Controller;


use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PaymentController
 * @package Pixi\IHTBundle\Controller
 * @Route("api/payment")
 */
class PaymentController extends RestController
{
    /**
     * @return Response
     * @Route("")
     * @Method("OPTIONS")
     */
    public function options()
    {
        $options = array(
            array(
                "name"=>"registrationNo",
                "displayName"=>"Registration No",
                "type"=>"string",
            ),
            array(
                "name"=>"comment",
                "displayName"=>"Coment",
                "type"=>"string",
            )
        );
        $response = new Response($this->serializer->serialize($options,"json"));
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }


    protected function getBundleEntity()
    {
        return "PixiIHTBundle:Payment";
    }

    protected function getEntityClass()
    {
        return "Pixi\\IHTBundle\\Entity\\Payment";
    }

}