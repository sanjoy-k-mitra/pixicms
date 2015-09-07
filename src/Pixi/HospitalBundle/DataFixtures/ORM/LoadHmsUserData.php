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
use Pixi\CoreBundle\Entity\User;

class LoadHmsUserData extends AbstractFixture implements OrderedFixtureInterface{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $reception = new User();
        $reception->setEmail('reception@pixicms.com');
        $reception->setUsername('reception');
        $reception->setPassword('reception');
        $reception->setUserRole($this->getReference('reception-role'));
        $reception->setName('Reception');
        $reception->setIsActive(true);
        $pharmacy = new User();
        $pharmacy->setEmail('pharmacy@pixicms.com');
        $pharmacy->setUsername('pharmacy');
        $pharmacy->setPassword('pharmacy');
        $pharmacy->setUserRole($this->getReference('pharmacy-role'));
        $pharmacy->setName('Pharmacy');
        $pharmacy->setIsActive(true);
        $management = new User();
        $management->setEmail('management@pixicms.com');
        $management->setUsername('management');
        $management->setPassword('management');
        $management->setUserRole($this->getReference('management-role'));
        $management->setName('Management');
        $management->setIsActive(true);

        $manager->persist($reception);
        $manager->persist($pharmacy);
        $manager->persist($management);
        $manager->flush();

        $this->addReference('reception', $reception);
        $this->addReference('pharmacy', $pharmacy);
        $this->addReference('management', $management);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }

}