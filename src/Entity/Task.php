<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tasks")
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 */
final class Task
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var TodoGist
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\TodoGist", inversedBy="tasks")
     * @ORM\JoinColumn(name="todo_gist_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $todoGist;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $subject;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $complete;

    /**
     * @param string $subject
     */
    public function __construct(string $subject)
    {
        $this->subject = $subject;
        $this->complete = false;
    }

    /**
     * @return string
     */
    public function subject(): string
    {
        return $this->subject;
    }

    /**
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->complete;
    }

    /**
     * Complete the task
     */
    public function complete(): void
    {
        $this->complete = true;
    }

    /**
     * @return int|null
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * @return TodoGist
     */
    public function todoGist(): TodoGist
    {
        return $this->todoGist;
    }

    /**
     * @param TodoGist $todoGist
     */
    public function setTodoGist(TodoGist $todoGist): void
    {
        $this->todoGist = $todoGist;
    }
}
