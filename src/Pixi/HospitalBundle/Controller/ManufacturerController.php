<?php

namespace Pixi\HospitalBundle\Controller;

use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class ManufacturerController
 * @package Pixi\HospitalBundle\Controller
 * @Route("api/manufacturer")
 */
class ManufacturerController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiHospitalBundle:Manufacturer";
    }

    protected function getEntityClass()
    {
        return "Pixi\\HospitalBundle\\Entity\\Manufacturer";
    }

}
