<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/31/15
 * Time: 6:29 PM
 */

namespace Pixi\LoyaltyManagerBundle\Controller;


use Pixi\CoreBundle\Controller\Api\RestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ItemController
 * @package Pixi\LoyaltyManagerBundle\Controller
 * @Route("api/item")
 */
class ItemController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiLoyaltyManagerBundle:Item";
    }

    protected function getEntityClass()
    {
        return "Pixi\\LoyaltyManagerBundle\\Entity\\Item";
    }

    /**
     * @return Response
     * @Route("/searchCode")
     */
    public function searchCode()
    {
        $code = $this->get('request')->get('code');
        $items = $this->getDoctrine()->getEntityManager()->getRepository($this->getBundleEntity())
            ->findBy(array('code' => $code));
        return new Response($this->serializer->serialize($items, 'json'));
    }

}