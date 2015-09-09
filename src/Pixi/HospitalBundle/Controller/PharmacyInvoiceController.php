<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 9/9/15
 * Time: 1:51 PM
 */

namespace Pixi\HospitalBundle\Controller;


use Pixi\CoreBundle\Controller\Api\RestController;
use Pixi\HospitalBundle\Entity\InventoryItem;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Acl\Exception\Exception;

/**
 * Class PharmacyInvoiceController
 * @package Pixi\HospitalBundle\Controller
 * @Route("api/pharmacyInvoice")
 */
class PharmacyInvoiceController extends RestController
{
    protected function getBundleEntity()
    {
        return "PixiHospitalBundle:PharmacyInvoice";
    }

    protected function getEntityClass()
    {
        return "Pixi\\HospitalBundle\\Entity\\PharmacyInvoice";
    }

    /**
     * @Route("")
     * @Method({"POST", "PUT"})
     */
    public function create(){
        $em = $this->getDoctrine()->getManager();
        $content = json_decode($this->get("request")->getContent());
        $iItems = array();
        foreach($content->inventoryItems as $ii){
            $i = new InventoryItem();
            $i->setProduct($em->getRepository("PixiHospitalBundle:Product")->find($ii->product->id));
            $i->setQuantity($ii->quantity);
            array_push($iItems, $i);
        }
        $content->inventoryItems = $iItems;
        try{
            $content->doctor = $em->find("PixiHospitalBundle:Doctor", $content->doctor->id);
        }catch (\Exception $e){

        }
        try{
            $content->patient = $em->find("PixiHospitalBundle:Patient", $content->patient->id);
        }catch (\Exception $e){

        }
        $object = $this->serializer->denormalize($content, $this->getEntityClass(), "json");
        $em->persist($object);
        foreach($object->getInventoryItems() as $ii){
            $ii->setPharmacyInvoice($object);
            $em->persist($ii);
        }
        $em->flush();
        $response = new Response($this->serializer->serialize($object, 'json'));
        $response->headers->set("Content-Type", "application/json");
        return $response;
    }

}