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

/**
 * Class AccountController
 * @package Pixi\IHTBundle\Controller
 * @Route("api/fee")
 */
class FeeController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiIHTBundle:Fee";
    }

    protected function getEntityClass()
    {
        return "Pixi\\IHTBundle\\Entity\\Fee";
    }

}