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
 * Class TransferController
 * @package Pixi\IHTBundle\Controller
 * @Route("api/transfer")
 */
class TransferController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiIHTBundle:Transfer";
    }

    protected function getEntityClass()
    {
        return "Pixi\\IHTBundle\\Entity\\Transfer";
    }

}