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

}