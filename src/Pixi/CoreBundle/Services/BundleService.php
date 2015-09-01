<?php
namespace Pixi\CoreBundle\Services;
use Pixi\CoreBundle\Events\PixiEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/28/15
 * Time: 2:37 AM
 */
class BundleService
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher){
        $this->dispatcher = $dispatcher;
    }

    public function triggerEvent($eventName, PixiEvent $event = null){
        if(is_null($event)){
            $event = new PixiEvent();
        }
        $this->dispatcher->dispatch($eventName, $event);
        return $event;
    }
}