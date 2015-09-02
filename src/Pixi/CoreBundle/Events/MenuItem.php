<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/2/15
 * Time: 12:23 PM
 */

namespace Pixi\CoreBundle\Events;


class MenuItem
{
    protected $displayName;
    protected $className;
    protected $iconClass;
    protected $action;

    /**
     * MenuItem constructor.
     * @param $displayName
     * @param $className
     * @param $iconClass
     * @param $action
     */
    public function __construct($displayName, $action, $iconClass = null, $className = null)
    {
        $this->displayName = $displayName;
        $this->className = $className;
        $this->iconClass = $iconClass;
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return mixed
     */
    public function getIconClass()
    {
        return $this->iconClass;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

}