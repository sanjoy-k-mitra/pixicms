<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/8/15
 * Time: 1:55 AM
 */

namespace Pixi\HospitalBundle\Services;


use Pixi\CoreBundle\Events\Menu;
use Pixi\CoreBundle\Events\MenuEvent;
use Pixi\CoreBundle\Events\MenuItem;
use Pixi\CoreBundle\Events\PixiEvent;
use Pixi\CoreBundle\Events\RouteEntry;
use Pixi\CoreBundle\Events\RouteEvent;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class HmsService extends ContainerAware
{
    protected $dispatcher;

    /**
     * HmsService constructor.
     * @param $dispatcher
     */
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function adminJsFiles(PixiEvent $event){
        $event->addData('/bundles/pixihospital/js/hms.js');
    }

    public function adminRoutes(RouteEvent $event){
        $event->addData(new RouteEntry('patient', '/patient', "/bundles/pixihospital/template/patient.html"));
        $event->addData(new RouteEntry('product', '/product', "/bundles/pixihospital/template/product.html"));
        $event->addData(new RouteEntry('category', '/category', "/bundles/pixihospital/template/category.html"));
        $event->addData(new RouteEntry('manufacturer', '/manufacturer', "/bundles/pixihospital/template/manufacturer.html"));
        $event->addData(new RouteEntry('doctor', '/doctor', "/bundles/pixihospital/template/doctor.html"));
        $event->addData(new RouteEntry('bed', '/bed', "/bundles/pixihospital/template/bed.html"));
    }

    public function adminSidebar(MenuEvent $event){
        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_RECEPTION')){
            $event->addChild(new MenuItem("Patient", "patient", "fa fa-ambulance fa-fw"));
        }
        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_PHARMACY')){
            $event->addChild(new MenuItem("Product", "product", "fa fa-medkit fa-fw"));
            $event->addChild(new MenuItem("Category", "category", "fa fa-medkit fa-fw"));
            $event->addChild(new MenuItem("Manufacturer", "manufacturer", "fa fa-medkit fa-fw"));
        }
        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_MANAGEMENT')){
            $event->addChild(new MenuItem("Doctor", "doctor", "fa fa-user-md fa-fw"));
            $event->addChild(new MenuItem("Bed", "bed", "fa fa-th fa-fw"));
        }

    }


}