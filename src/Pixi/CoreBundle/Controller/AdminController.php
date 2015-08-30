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
        $jsFiles = $this->get("bundle_service")->getAdminJsFiles();
        return array();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin/app.js", name="adminAppJs")
     */
    public function appJsAction(){
        return $this->render("PixiCoreBundle:Admin:app.js.twig", array());
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin/sidebar", name="adminSidebar")
     */
    public function sidebarAction(){
        return $this->render("PixiCoreBundle:Admin:sidebar.html.twig", array());
    }

}