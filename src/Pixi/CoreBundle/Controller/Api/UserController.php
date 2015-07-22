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

    protected $ignoredProperties = array("users", "lazyPropertiesDefaults", "__initializer__", "__cloner__", "__isInitialized__");

    protected function getEntityClass(){
        return "PixiCoreBundle:User";
    }



}