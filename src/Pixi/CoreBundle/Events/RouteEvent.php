<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/2/15
 * Time: 1:06 PM
 */

namespace Pixi\CoreBundle\Events;


class RouteEvent extends PixiEvent
{

    public function addData($entry){
        if($entry instanceof RouteEntry){
            array_push($this->data, $entry);
        }else{
            throw new \ErrorException("Expected RouteEntry");
        }
    }
}