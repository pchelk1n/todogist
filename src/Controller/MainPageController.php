<?php

namespace App\Controller;

use App\Repository\TodoGistRepository;
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
     * @param TodoGistRepository $repository
     * @return Response
     */
    public function index(TodoGistRepository $repository): Response
    {
        $todoGists = $repository->getTodoGistsWithTasks();

        return $this->render('todoGists.html.twig', [
            'todoGists' => $todoGists,
        ]);
    }
}
