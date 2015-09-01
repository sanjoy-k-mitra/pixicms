<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/31/15
 * Time: 6:29 PM
 */

namespace Pixi\LoyaltyManagerBundle\Controller;


use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ItemController
 * @package Pixi\LoyaltyManagerBundle\Controller
 * @Route("api/item")
 */
class ItemController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiLoyaltyManagerBundle:Item";
    }

    protected function getEntityClass()
    {
        return "Pixi\\LoyaltyManagerBundle\\Entity\\Item";
    }

}