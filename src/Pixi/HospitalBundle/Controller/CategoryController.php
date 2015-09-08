<?php

namespace Pixi\HospitalBundle\Controller;

use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CategoryController
 * @package Pixi\HospitalBundle\Controller
 * @Route("api/category")
 */
class CategoryController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiHospitalBundle:Category";
    }

    protected function getEntityClass()
    {
        return "Pixi\\HospitalBundle\\Entity\\Category";
    }

}
