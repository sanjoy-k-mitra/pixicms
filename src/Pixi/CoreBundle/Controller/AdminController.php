<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 6/26/15
 * Time: 5:30 PM
 */

namespace Pixi\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class AdminController
 * @package Pixi\CoreBundle\Controller
 * @Security("has_role('ROLE_ADMIN')")
 */
class AdminController extends Controller{
    /**
     * @Route("/admin/", name="adminPanel")
     * @Template()
     */
    public function indexAction(){
        return array();
    }

}