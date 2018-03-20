<?php

namespace App\UseCase\Projects;

use App\Repository\ProjectRepository;

/**
 * Class GetProjects
 */
class GetProjects
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * @param ProjectRepository $repository
     */
    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return ProjectDTO[]
     */
    public function __invoke(): array
    {
        $data = [];

        $projects = $this->repository->findAll();
        foreach ($projects as $project) {
            $data[] = ProjectDTO::create($project);
        }

        return $data;
    }
}
