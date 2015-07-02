<?php

namespace Pixi\TemplateBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PixiTemplateBundle extends Bundle
{
    public function getParent()
    {
//        return parent::getParent();
        return 'PixiCoreBundle';
    }


}
