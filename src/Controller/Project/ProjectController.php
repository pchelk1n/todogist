<?php

namespace App\Controller\Project;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ProjectController
 */
class ProjectController
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
     * @Route("/add-project/", methods={"POST"}, name="add_project")
     * @param Request $request
     * @return RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function addProject(Request $request): RedirectResponse
    {
        $dto = new ProjectDTO();
        $dto->subject = $request->get('subject');
        $errors = $this->validator->validate($dto);

        if (!\count($errors)) {
            $project = new Project($dto->subject);

            $this->em->persist($project);
            $this->em->flush();
        }

        return new RedirectResponse($this->urlGenerator->generate('main'));
    }

    /**
     * @Route("/remove-project/{id}", name="remove_project")
     * @param Project $project
     *
     * @return RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function removeProject(Project $project): RedirectResponse
    {
        $this->em->remove($project);
        $this->em->flush();

        return new RedirectResponse($this->urlGenerator->generate('main'));
    }
}
