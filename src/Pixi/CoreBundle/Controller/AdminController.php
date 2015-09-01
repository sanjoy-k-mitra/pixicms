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
        $jsFiles = $this->get("bundle_service")->triggerEvent('pixi.admin_js_files')->data;
        return array('plugable_js_files'=>$jsFiles);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin/app.js", name="adminAppJs")
     */
    public function appJsAction(){
        $plugable_routes = $this->get("bundle_service")->triggerEvent('pixi.admin_routes')->data;
        return $this->render("PixiCoreBundle:Admin:app.js.twig", array('plugable_routes' => $plugable_routes));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin/sidebar", name="adminSidebar")
     */
    public function sidebarAction(){
        $plugable_sidebar_entry = $this->get("bundle_service")->triggerEvent("pixi.admin_sidebar_entries")->data;
        return $this->render("PixiCoreBundle:Admin:sidebar.html.twig", array("plugable_sidebar_entry"=>$plugable_sidebar_entry));
    }

}