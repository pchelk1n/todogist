<?php

namespace App\UseCase\Tasks;

use App\Repository\TaskRepository;

/**
 * Class GetTasks
 */
class GetTasks
{

    /**
     * @var TaskRepository
     */
    private $repository;

    /**
     * @param TaskRepository $repository
     */
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return TasksDTO[]
     */
    public function __invoke(): array
    {
        $tasksDTO = [];

        $tasks = $this->repository->findAll();
        foreach ($tasks as $task) {
            $tasksDTO[] = TasksDTO::createFromTask($task);
        }

        return $tasksDTO;
    }
}
