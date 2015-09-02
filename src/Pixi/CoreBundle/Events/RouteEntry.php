<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/2/15
 * Time: 1:05 PM
 */

namespace Pixi\CoreBundle\Events;


class RouteEntry
{
    protected $name;
    protected $sref;
    protected $path;

    /**
     * RouteEntry constructor.
     * @param $name
     * @param $sref
     * @param $path
     */
    public function __construct($name, $sref, $path)
    {
        $this->name = $name;
        $this->sref = $sref;
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSref()
    {
        return $this->sref;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }



}