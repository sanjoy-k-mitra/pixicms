<?php

namespace Pixi\HospitalBundle\Controller;

use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class BedController
 * @package Pixi\HospitalBundle\Controller
 * @Route("api/bed")
 */
class BedController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiHospitalBundle:Bed";
    }

    protected function getEntityClass()
    {
        return "Pixi\\HospitalBundle\\Entity\\Bed";
    }

}
