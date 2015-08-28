<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/28/15
 * Time: 4:58 AM
 */

namespace Pixi\CoreBundle\Events;


use Symfony\Component\EventDispatcher\Event;

class ResourceListEvent extends Event
{
    private $resources = array();

    public function getResources(){
        return $this->resources;
    }

    public function addResource($filePath){
        array_push($this->resources, $filePath);
    }
}