<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/31/15
 * Time: 3:48 PM
 */

namespace Pixi\LoyaltyManagerBundle\Services;


use Pixi\CoreBundle\Events\PixiEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class LoyaltyManagerService
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher){
        $this->dispatcher = $dispatcher;
    }

    public function adminJsFiles(PixiEvent $event){
        array_push($event->data, '/bundles/pixiloyaltymanager/js/loyalty_manager.js');
    }

    public function adminRoutes(PixiEvent $event){
        $event->data =array_merge($event->data, array(
            "item"=>"/bundles/pixiloyaltymanager/template/item.html"
        ));
    }

    public function adminSidebar(PixiEvent $event){
        array_push($event->data, array(
            'sref'=>'item',
            'title'=>'Item',
            'imageClass'=>'fa fa-key fa-fw'
        ));
    }

}