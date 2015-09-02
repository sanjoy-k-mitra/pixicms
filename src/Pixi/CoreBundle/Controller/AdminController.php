<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 6/26/15
 * Time: 5:30 PM
 */

namespace Pixi\CoreBundle\Controller;

use Pixi\CoreBundle\Events\Menu;
use Pixi\CoreBundle\Events\MenuEvent;
use Pixi\CoreBundle\Events\MenuItem;
use Pixi\CoreBundle\Events\RouteEntry;
use Pixi\CoreBundle\Events\RouteEvent;
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
        $jsFiles = $this->get("bundle_service")->triggerEvent('pixi.admin_js_files')->getData();
        return array('plugable_js_files'=>$jsFiles);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin/app.js", name="adminAppJs")
     */
    public function appJsAction(){
        $routeEvent = new RouteEvent(array(
            new RouteEntry('dashboard', '/dashboard', 'templates/dashboard.html')
        ));
        $routes = $this->get("bundle_service")->triggerEvent('pixi.admin_routes', $routeEvent)->getData();
        return $this->render("PixiCoreBundle:Admin:app.js.twig", array('routes' => $routes));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin/sidebar", name="adminSidebar")
     */
    public function sidebarAction(){
        $sidebarEvent = new MenuEvent();
        $sidebarEvent->addChild(new MenuItem("Dashboard", "dashboard", "fa fa-dashboard"));
        $this->get("bundle_service")->triggerEvent("pixi.admin_sidebar_entries", $sidebarEvent);
        if ($this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            $aclMenu = new Menu(array(
                new MenuItem("Users", 'user', 'fa fa-user'),
                new MenuItem("Roles", 'role', 'fa fa-key'),
                new MenuItem("Permissions", 'permission', 'fa fa-check')
            ), "Access Control", null, "fa fa-lock fa-fw");
            $sidebarEvent->addChild($aclMenu);
        }
        $sidebar_entries = $sidebarEvent->getData()->getChildren();
        return $this->render("PixiCoreBundle:Admin:sidebar.html.twig", array("sidebar_entries"=>$sidebar_entries));
    }

}