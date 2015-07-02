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

class LoadPermissionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new Permission();
        $user->setKey('ROLE_USER');
        $user->setName('User');
        $admin = new Permission();
        $admin->setKey('ROLE_ADMIN');
        $admin->setName('Admin');
        $superAdmin = new Permission();
        $superAdmin->setKey('ROLE_SUPER_ADMIN');
        $superAdmin->setName('Super Admin');

        $manager->persist($user);
        $manager->persist($admin);
        $manager->persist($superAdmin);
        $manager->flush();

        $this->addReference('user-permission', $user);
        $this->addReference('admin-permission', $admin);
        $this->addReference('super-admin-permission', $superAdmin);
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