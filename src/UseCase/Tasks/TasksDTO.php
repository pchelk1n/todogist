<?php

namespace App\UseCase\Tasks;

use App\Entity\Task;

/**
 * Class TasksDTO
 */
class TasksDTO
{
    public $id;
    public $subject;
    public $isComplete;

    /**
     * @param Task $task
     *
     * @return TasksDTO
     */
    public static function createFromTask(Task $task): self
    {
        $taskDTO = new self();
        $taskDTO->id = $task->id();
        $taskDTO->subject = $task->subject();
        $taskDTO->isComplete = $task->isComplete();

        return $taskDTO;
    }
}
