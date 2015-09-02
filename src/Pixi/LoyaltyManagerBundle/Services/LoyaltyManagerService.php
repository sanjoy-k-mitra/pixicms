<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/31/15
 * Time: 3:48 PM
 */

namespace Pixi\LoyaltyManagerBundle\Services;


use Pixi\CoreBundle\Events\Menu;
use Pixi\CoreBundle\Events\MenuEvent;
use Pixi\CoreBundle\Events\MenuItem;
use Pixi\CoreBundle\Events\PixiEvent;
use Pixi\CoreBundle\Events\RouteEntry;
use Pixi\CoreBundle\Events\RouteEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class LoyaltyManagerService
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher){
        $this->dispatcher = $dispatcher;
    }

    public function adminJsFiles(PixiEvent $event){
        $event->addData('/bundles/pixiloyaltymanager/js/loyalty_manager.js');
    }

    public function adminRoutes(RouteEvent $event){
        $event->addData(new RouteEntry('item', '/item', "/bundles/pixiloyaltymanager/template/item.html"));
        $event->addData(new RouteEntry('offer', '/offer', "/bundles/pixiloyaltymanager/template/offer.html"));
        $event->addData(new RouteEntry('shop', '/shop', "/bundles/pixiloyaltymanager/template/shop.html"));
    }

    public function adminSidebar(MenuEvent $event){
        $event->addChild(new Menu(array(
            new MenuItem("Item", "item", "fa fa-cube fa-fw"),
            new MenuItem("Offer", "offer", "fa fa-certificate fa-fw"),
            new MenuItem("Shop", "shop", "fa fa-shopping-cart fa-fw"),
        ), "Loyalty Manager", null, "fa fa-gift fa-fw"));
    }

}