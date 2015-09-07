<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/2/15
 * Time: 5:37 AM
 */

namespace Pixi\CoreBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Pixi\CoreBundle\Entity\Permission;

class LoadHmsPermissionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $reception = new Permission();
        $reception->setKey('ROLE_RECEPTION');
        $reception->setName('Reception');
        $pharmacy = new Permission();
        $pharmacy->setKey('ROLE_PHARMACY');
        $pharmacy->setName('Pharmacy');
        $management = new Permission();
        $management->setKey('ROLE_MANAGEMENT');
        $management->setName('Management');

        $manager->persist($reception);
        $manager->persist($pharmacy);
        $manager->persist($management);
        $manager->flush();

        $this->addReference('reception-permission', $reception);
        $this->addReference('pharmacy-permission', $pharmacy);
        $this->addReference('management-permission', $management);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }


}