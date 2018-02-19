<?php

namespace App\UseCase\Project;

use App\Repository\ProjectRepository;

/**
 * Class ProjectList
 */
final class ProjectList
{

    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @param ProjectRepository $gistRepository
     */
    public function __construct(ProjectRepository $gistRepository)
    {
        $this->projectRepository = $gistRepository;
    }


    /**
     * @return ProjectDTO[]
     */
    public function execute(): array
    {
        $projects = $this->projectRepository->getProjectsWithTasks();

        $result = [];

        foreach ($projects as $project) {
            $projectDTO = new ProjectDTO();
            $projectDTO->subject = $project->subject();
            foreach ($project->tasks() as $task) {
                $taskDTO = new TaskDTO();
                $taskDTO->id = $task->id();
                $taskDTO->subject = $task->subject();
                $projectDTO->tasks[] = $taskDTO;
            }

            $result[] = $projectDTO;
        }

        return $result;
    }
}
