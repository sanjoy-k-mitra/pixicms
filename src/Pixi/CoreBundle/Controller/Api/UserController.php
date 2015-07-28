<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/14/15
 * Time: 4:04 PM
 */

namespace Pixi\CoreBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Class UserController
 * @package Pixi\CoreBundle\Controller\Api
 * @Route("api/user")
 */
class UserController extends RestController{

    protected function getBundleEntity()
    {
        return "PixiCoreBundle:User";
    }

    public function getEntityClass(){
        return "Pixi\\CoreBundle\\Entity\\User";
    }
}