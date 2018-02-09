<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class TodoGist
 */
final class TodoGist
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var Collection|Task[]
     */
    private $tasks;

    /**
     * @param string $subject
     */
    public function __construct(string $subject)
    {
        $this->subject = $subject;
        $this->tasks = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function subject(): string
    {
        return $this->subject;
    }

    /**
     * @return int
     */
    public function countTasks(): int
    {
        return $this->tasks->count();
    }

    /**
     * @param Task $task
     */
    public function addTask(Task $task): void
    {
        $this->tasks->add($task);
    }

    /**
     * @return Task[]
     */
    public function tasks(): array
    {
        return $this->tasks->toArray();
    }
}
