<?php

namespace App\Controller;

use App\UseCase\Project\ProjectList;
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
     * @param ProjectList $useCase
     *
     * @return Response
     */
    public function index(ProjectList $useCase): Response
    {
        $projects = $useCase->execute();

        return $this->render('projects.html.twig', [
            'projects' => $projects,
        ]);
    }
}
