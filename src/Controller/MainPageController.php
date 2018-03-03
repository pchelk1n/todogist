<?php

namespace App\Controller;

use App\UseCase\Tasks\GetTasks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainPageController
 */
final class MainPageController extends Controller
{
    /**
     * @Route("/")
     * @param GetTasks $getTasks
     *
     * @return Response
     */
    public function show(GetTasks $getTasks): Response
    {
        return $this->render('main.html.twig', [
            'tasks' => $getTasks(),
        ]);
    }
}
