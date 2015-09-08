<?php

namespace Pixi\HospitalBundle\Controller;

use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DoctorController
 * @package Pixi\HospitalBundle\Controller
 * @Route("api/doctor")
 */
class DoctorController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiHospitalBundle:Doctor";
    }

    protected function getEntityClass()
    {
        return "Pixi\\HospitalBundle\\Entity\\Doctor";
    }

}
