<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
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
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $subject;

    /**
     * @var Collection|Task[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="project")
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

        $task->addProject($this);
    }

    /**
     * @return Task[]
     */
    public function tasks(): array
    {
        return $this->tasks->toArray();
    }

    /**
     * @return int
     */
    public function id(): ?int
    {
        return $this->id;
    }
}
