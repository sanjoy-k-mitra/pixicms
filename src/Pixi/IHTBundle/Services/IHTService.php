<?php
namespace Pixi\IHTBundle\Services;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Pixi\CoreBundle\Events\PixiEvent;
use Pixi\CoreBundle\Events\MenuEvent;
use Pixi\CoreBundle\Events\RouteEvent;
use Pixi\CoreBundle\Events\Menu;
use Pixi\CoreBundle\Events\MenuItem;
use Pixi\CoreBundle\Events\RouteEntry;

/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 12/7/15
 * Time: 3:27 PM
 */
class IHTService
{

    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcherInterface)
    {
        $this->dispatcher = $dispatcherInterface;
    }

    public function adminJsFiles(PixiEvent $event){
        $event->addData('/bundles/pixiiht/js/pixiiht.js');
    }

    public function adminRoutes(RouteEvent $event){
        $event->addData(new RouteEntry('accounts', '/accounts', "/bundles/pixiiht/template/accounts.html"));
        $event->addData(new RouteEntry('fees', '/fees', "/bundles/pixiiht/template/fees.html"));
    }

    public function adminSidebar(MenuEvent $event){
        $event->addChild(new Menu(array(
            new MenuItem("Accounts", "accounts", "fa fa-cube fa-fw"),
            new MenuItem("Fees", "fees", "fa fa-cube fa-fw")
        ), "IHT Settings", null, "fa fa-cog fa-fw"));
    }

}