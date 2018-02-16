<?php

namespace App\Controller;

use App\UseCase\TodoGist\TodoGistList;
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
     * @param TodoGistList $useCase
     * @return Response
     */
    public function index(TodoGistList $useCase): Response
    {
        $todoGists = $useCase->execute();

        return $this->render('todoGists.html.twig', [
            'todoGists' => $todoGists,
        ]);
    }
}
