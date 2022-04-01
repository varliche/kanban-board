<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setFirstName('user' . $i);
            $user->setLastName('kanban');
            $user->setEmail('user' . $i . 'kanban@mail.test.com');
            $user->setPassword('1234kanbanuser' . $i);
            $user->setCreatedOn(new \DateTime());
            $manager->persist($user);
        }

        $manager->flush();
    }
}
