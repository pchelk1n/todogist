<?php

namespace App\Controller;

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
     * @throws \InvalidArgumentException
     */
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
}
