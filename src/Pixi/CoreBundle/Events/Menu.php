<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/2/15
 * Time: 12:25 PM
 */

namespace Pixi\CoreBundle\Events;


class Menu extends MenuItem
{
    protected $children;

    /**
     * Menu constructor.
     * @param $children
     */
    public function __construct(array $children = array(),$displayName = null, $action = null, $iconClass = null, $className = null)
    {
        parent::__construct($displayName, $action, $iconClass, $className);
        if(is_null($children)){
            $children = array();
        }
        $this->children = $children;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param MenuItem $child
     * @return $this
     */
    public function addChild(MenuItem $child){
        array_push($this->children, $child);
        return $this;
    }

    /**
     * @param MenuItem $children
     * @return $this
     */
    public function addChildren(MenuItem $children){
        array_merge($this->children, $children);
        return $this;
    }
}