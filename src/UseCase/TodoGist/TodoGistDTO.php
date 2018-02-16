<?php

namespace App\UseCase\TodoGist;

/**
 * Class TodoGistDTO
 */
final class TodoGistDTO
{
    public $subject;

    /**
     * @var TaskDTO[]
     */
    public $tasks;
}
