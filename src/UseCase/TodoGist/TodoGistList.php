<?php

namespace App\UseCase\TodoGist;

use App\Repository\TodoGistRepository;

/**
 * Class TodoGistList
 */
final class TodoGistList
{

    /**
     * @var TodoGistRepository
     */
    private $gistRepository;

    /**
     * @param TodoGistRepository $gistRepository
     */
    public function __construct(TodoGistRepository $gistRepository)
    {
        $this->gistRepository = $gistRepository;
    }


    /**
     * @return TodoGistDTO[]
     */
    public function execute(): array
    {
        $gists = $this->gistRepository->getTodoGistsWithTasks();

        $result = [];

        foreach ($gists as $gist) {
            $gistDTO = new TodoGistDTO();
            $gistDTO->subject = $gist->subject();
            foreach ($gist->tasks() as $task) {
                $taskDTO = new TaskDTO();
                $taskDTO->id = $task->id();
                $taskDTO->subject = $task->subject();
                $gistDTO->tasks[] = $taskDTO;
            }

            $result[] = $gistDTO;
        }

        return $result;
    }
}
