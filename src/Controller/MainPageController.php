<?php

namespace App\Controller;

use App\Entity\TodoGist;
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
     *
     * @return Response
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function index(): Response
    {
        $todoGists = $this->getDoctrine()->getRepository(TodoGist::class)
            ->getTodoGistsWithTasks();

        return $this->render('todoGists.html.twig', [
            'todoGists' => $todoGists,
        ]);
    }
}
