<?php

namespace App\Controller\Task;

use App\Entity\Task;
use App\Repository\ProjectRepository;

/**
 * Class TaskFacade
 */
class TaskFacade
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;


    /**
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @param TaskDTO $dto
     *
     * @return Task
     */
    public function create(TaskDTO $dto): Task
    {
        $task = new Task($dto->subject);

        if ($dto->projectId) {
            $project = $this->projectRepository->find($dto->projectId);
            if ($project) {
                $task->addProject($project);
            }
        }

        return $task;
    }
}
