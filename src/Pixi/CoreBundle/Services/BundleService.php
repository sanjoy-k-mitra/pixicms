<?php
namespace Pixi\CoreBundle\Services;
use Pixi\CoreBundle\Events\ResourceListEvent;
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

     public function getAdminJsFiles(){
         $resourceListEvent = new ResourceListEvent();
         $this->dispatcher->dispatch('pixi.admin_js_files' ,$resourceListEvent);
         return $resourceListEvent->getResources();
     }
}