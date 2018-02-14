<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\TodoGist;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TestController
 */
final class TestController
{

    /**
     * @Route("/")
     *
     * @param EntityManagerInterface $em
     *
     * @return Response
     * @throws \InvalidArgumentException
     */
    public function test(EntityManagerInterface $em): Response
    {
        $todoGist = new TodoGist('test');

        $task1 = new Task('task 1');
        $task2 = new Task('task 2');

        $todoGist->addTask($task1);
        $todoGist->addTask($task2);

        $em->persist($task1);
        $em->persist($task2);
        $em->persist($todoGist);

        $em->flush();

        $em->remove($task2);
        $em->flush();


        return new Response('123');
    }
}
