<?php

namespace App\Controller\Task;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TaskController
 */
class TaskController
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @param ValidatorInterface     $validator
     * @param EntityManagerInterface $em
     * @param UrlGeneratorInterface  $urlGenerator
     */
    public function __construct(
        ValidatorInterface $validator,
        EntityManagerInterface $em,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->validator = $validator;
        $this->em = $em;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route("/add-task/", methods={"POST"}, name="add_task")
     * @param Request $request
     * @return RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function addTask(Request $request): RedirectResponse
    {
        $dto = new TaskDTO();
        $dto->subject = $request->get('subject');
        $errors = $this->validator->validate($dto);

        if (!\count($errors)) {
            $task = new Task($dto->subject);

            $this->em->persist($task);
            $this->em->flush();
        }

        return new RedirectResponse($this->urlGenerator->generate('main'));
    }
}
