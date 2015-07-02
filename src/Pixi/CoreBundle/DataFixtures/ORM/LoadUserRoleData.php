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

class LoadUserRoleData extends AbstractFixture implements OrderedFixtureInterface{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new UserRole();
        $user->addPermission($this->getReference('user-permission'));
        $user->setName('User');
        $admin = new UserRole();
        $admin->addPermission($this->getReference('admin-permission'));
        $admin->setName('Admin');
        $superAdmin = new UserRole();
        $superAdmin->addPermission($this->getReference('super-admin-permission'));
        $superAdmin->setName('Super Admin');

        $manager->persist($user);
        $manager->persist($admin);
        $manager->persist($superAdmin);
        $manager->flush();

        $this->addReference('user-role', $user);
        $this->addReference('admin-role', $admin);
        $this->addReference('super-admin-role', $superAdmin);
    }

    public function getOrder(){
        return 2;
    }

}