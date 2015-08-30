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
 * Class OfferController
 * @package Pixi\LoyaltyManagerBundle\Tests\Controller
 * @Route("api/offer")
 */
class OfferController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiLoyaltyManagerBundle:Offer";
    }

    protected function getEntityClass()
    {
        return "Pixi\\LoyaltyManagerBundle\\Entity\\Offer";
    }

}