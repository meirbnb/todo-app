<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $task = new Task();
        $task->setName('Codereview');
        $manager->persist($task);
        $manager->flush();

        $task2 = new Task();
        $task2->setName('Pair programming');
        $manager->persist($task2);
        $manager->flush();

        $task3 = new Task();
        $task3->setName('Bugfixing');
        $manager->persist($task3);
        $manager->flush();

        $task4 = new Task();
        $task4->setName('Refactor');
        $manager->persist($task4);
        $manager->flush();

        $task5 = new Task();
        $task5->setName('Communication');
        $manager->persist($task5);
        $manager->flush();
    }
}
