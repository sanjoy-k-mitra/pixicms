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

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('superadmin@pixicms.com');
        $user->setUsername('user');
        $user->setPassword('user');
        $user->setUserRole($this->getReference('user-role'));
        $user->setName('User');
        $user->setIsActive(true);
        $admin = new User();
        $admin->setEmail('superadmin@pixicms.com');
        $admin->setUsername('admin');
        $admin->setPassword('admin');
        $admin->setUserRole($this->getReference('admin-role'));
        $admin->setName('Admin');
        $admin->setIsActive(true);
        $superAdmin = new User();
        $superAdmin->setEmail('superadmin@pixicms.com');
        $superAdmin->setUsername('superadmin');
        $superAdmin->setPassword('superadmin');
        $superAdmin->setUserRole($this->getReference('super-admin-role'));
        $superAdmin->setName('Super Admin');
        $superAdmin->setIsActive(true);

        $manager->persist($user);
        $manager->persist($admin);
        $manager->persist($superAdmin);
        $manager->flush();

        $this->addReference('user', $user);
        $this->addReference('admin', $admin);
        $this->addReference('super-admin', $superAdmin);
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