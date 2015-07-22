<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/22/15
 * Time: 3:58 PM
 */

namespace Pixi\CoreBundle\Controller\Api;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Class MessageController
 * @package Pixi\CoreBundle\Controller\Api
 * @Route("api/message")
 */
class MessageController extends RestController{

    protected function getEntityClass()
    {
        return "PixiCoreBundle:Message";
    }

    public function __construct(){
        parent::__construct();
        $this->ignoredProperties = array_merge($this->ignoredProperties, array("userRole"));
        $this->normalizer->setIgnoredAttributes($this->ignoredProperties);
    }
}