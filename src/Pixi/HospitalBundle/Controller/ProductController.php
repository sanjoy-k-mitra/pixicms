<?php

namespace Pixi\HospitalBundle\Controller;

use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ProductController
 * @package Pixi\HospitalBundle\Controller
 * @Route("api/product")
 */
class ProductController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiHospitalBundle:Product";
    }

    protected function getEntityClass()
    {
        return "Pixi\\HospitalBundle\\Entity\\Product";
    }

}
