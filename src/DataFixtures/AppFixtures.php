<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->getRepository(Task::class)->save(new Task('Codereview', true));
        $manager->getRepository(Task::class)->save(new Task('Pair programming'));
        $manager->getRepository(Task::class)->save(new Task('Bugfixing', true));
        $manager->getRepository(Task::class)->save(new Task('Refactor'));
        $manager->getRepository(Task::class)->save(new Task('Communication'));
    }
}
