<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 6/26/15
 * Time: 7:24 PM
 */

namespace Pixi\CoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class SecurityController extends Controller{

    /**
     *
     * @Route("/login", name="login_path")
     * @Template
     */
    public function loginAction(Request $request){
        $authUtils = $this->get('security.authentication_utils');
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
        return array(
            'last_username' => $lastUsername,
            'error' => $error
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction(){

    }
}