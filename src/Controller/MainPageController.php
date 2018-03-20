<?php

namespace App\Controller;

use App\UseCase\Projects\GetProjects;
use App\UseCase\Tasks\GetTasks;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainPageController
 */
class MainPageController
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @param EngineInterface $templating
     */
    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @Route("/", name="main")
     * @param GetTasks    $getTasks
     * @param GetProjects $getProjects
     *
     * @return Response
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function show(GetTasks $getTasks, GetProjects $getProjects): Response
    {
        return new Response($this->templating->render('main.html.twig', [
            'tasks' => $getTasks(),
            'projects' => $getProjects(),
        ]));
    }
}
