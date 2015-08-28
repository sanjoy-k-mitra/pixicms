<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/28/15
 * Time: 4:43 AM
 */

namespace Pixi\EcommerceBundle\Services;


use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PixiEcommerceService
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher){
        $this->dispatcher = $dispatcher;
    }

    public function adminJsFiles($a, $b){
        return;
    }

}