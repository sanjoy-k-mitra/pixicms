<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/8/15
 * Time: 3:32 PM
 */

namespace Pixi\HospitalBundle\Controller;


use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class InventoryItemController
 * @package Pixi\HospitalBundle\Controller
 * @Route("api/inventoryItem")
 */
class InventoryItemController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiHoispitalBundle:InventoryItem";
    }

    protected function getEntityClass()
    {
        return "Pixi\\HospitalBundle\\Entity\\InventoryItem";
    }

}