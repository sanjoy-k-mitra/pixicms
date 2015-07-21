<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/21/15
 * Time: 3:01 PM
 */

namespace Pixi\CoreBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class UserRoleController
 * @package Pixi\CoreBundle\Controller\Api
 * @Route("api/userRole")
 */
class UserRoleController extends RestController{

    protected $ignoredProperties = array("userRoles", "userRole");

    protected function getEntityClass()
    {
        return "PixiCoreBundle:UserRole";
    }

}