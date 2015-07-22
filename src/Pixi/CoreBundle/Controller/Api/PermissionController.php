<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/21/15
 * Time: 3:04 PM
 */

namespace Pixi\CoreBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Class PermissionController
 * @package Pixi\CoreBundle\Controller\Api
 * @Route("api/permission")
 */
class PermissionController extends RestController
{

    protected function getEntityClass()
    {
        return "PixiCoreBundle:Permission";
    }
}