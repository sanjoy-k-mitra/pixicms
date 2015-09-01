<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/28/15
 * Time: 4:58 AM
 */

namespace Pixi\CoreBundle\Events;


use Symfony\Component\EventDispatcher\Event;

class PixiEvent extends Event
{
    public $data = array();

}