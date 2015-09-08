<?php

namespace Pixi\HospitalBundle\Controller;

use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class PatientController
 * @package Pixi\HospitalBundle\Controller
 * @Route("api/patient")
 */
class PatientController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiHospitalBundle:Patient";
    }

    protected function getEntityClass()
    {
        return "Pixi\\HospitalBundle\\Entity\\Patient";
    }

}
