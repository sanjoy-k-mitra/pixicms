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
    protected $data;

    /**
     * PixiEvent constructor.
     * @param $data
     */
    public function __construct($data = null)
    {
        if(is_null($data)){
            $data = array();
        }
        $this->data = $data;
    }


    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function addData($entry){
        if(is_array($entry)){
            array_merge($this->data, $entry);
        }else{
            array_push($this->data, $entry);
        }
    }


}