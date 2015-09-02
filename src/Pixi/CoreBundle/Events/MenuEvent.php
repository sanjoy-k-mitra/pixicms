<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/2/15
 * Time: 12:32 PM
 */

namespace Pixi\CoreBundle\Events;


class MenuEvent extends PixiEvent
{
    public function __construct(Menu $menu = null)
    {
        if(is_null($menu)){
            $menu = new Menu();
        }
        $this->data = $menu;
    }

    public function addChild(MenuItem $menuItem){
        $this->data->addChild($menuItem);
    }
}