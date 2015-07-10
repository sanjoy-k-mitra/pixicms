<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/10/15
 * Time: 3:36 PM
 */

namespace Pixi\CoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TemplateController extends Controller {

    /**
     * @Route("template/{viewFilePath}")
     */
    public function getHtmlView($viewFilePath){
        $viewFilePath = str_replace("_", "/", $viewFilePath).".twig";
        return $this->render($viewFilePath, array());
    }

}