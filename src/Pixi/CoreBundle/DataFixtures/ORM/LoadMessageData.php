<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/22/15
 * Time: 12:46 PM
 */

namespace Pixi\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Pixi\CoreBundle\Entity\Message;

class LoadMessageData extends AbstractFixture implements OrderedFixtureInterface{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $message = new Message();
        $message->setFrom($this->getReference("super-admin"));
        $message->setTo($this->getReference("user"));
        $message->setSubject("Welcome To PixiCMS");
        $message->setMessage("On Behalf of the PixiCMS Team i thank you for joining PixiCMS");
        $manager->persist($message);
        $message = new Message();
        $message->setFrom($this->getReference("super-admin"));
        $message->setTo($this->getReference("user"));
        $message->setSubject("Contact Us if you need any help");
        $message->setMessage("Please feel free to contact us via email anytime you like");
        $manager->persist($message);
        $message = new Message();
        $message->setFrom($this->getReference("super-admin"));
        $message->setTo($this->getReference("admin"));
        $message->setSubject("Welcome To PixiCMS");
        $message->setMessage("On Behalf of the PixiCMS Team i thank you for joining PixiCMS");
        $manager->persist($message);
        $message = new Message();
        $message->setFrom($this->getReference("super-admin"));
        $message->setTo($this->getReference("admin"));
        $message->setSubject("Contact Us if you need any help");
        $message->setMessage("Please feel free to contact us via email anytime you like");
        $manager->persist($message);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }


}