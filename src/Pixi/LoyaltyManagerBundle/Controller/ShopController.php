<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/30/15
 * Time: 8:46 PM
 */

namespace Pixi\LoyaltyManagerBundle\Controller;


use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ShopController
 * @package Pixi\LoyaltyManagerBundle\Controller
 * @Route("api/shop")
 */
class ShopController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiLoyaltyManagerBundle:Shop";
    }

    protected function getEntityClass()
    {
        return "Pixi\\LoyaltyManagerBundle\\Entity\\Shop";
    }

}