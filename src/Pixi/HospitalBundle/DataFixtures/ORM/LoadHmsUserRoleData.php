<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/2/15
 * Time: 5:41 AM
 */

namespace Pixi\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Pixi\CoreBundle\Entity\UserRole;

class LoadHmsUserRoleData extends AbstractFixture implements OrderedFixtureInterface{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $reception = new UserRole();
        $reception->addPermission($this->getReference('reception-permission'));
        $reception->setName('Reception');
        $pharmacy = new UserRole();
        $pharmacy->addPermission($this->getReference('pharmacy-permission'));
        $pharmacy->setName('Pharmacy');
        $management = new UserRole();
        $management->addPermission($this->getReference('management-permission'));
        $management->setName('Management');

        $manager->persist($reception);
        $manager->persist($pharmacy);
        $manager->persist($management);
        $manager->flush();

        $this->addReference('reception-role', $reception);
        $this->addReference('pharmacy-role', $pharmacy);
        $this->addReference('management-role', $management);
    }

    public function getOrder(){
        return 2;
    }

}