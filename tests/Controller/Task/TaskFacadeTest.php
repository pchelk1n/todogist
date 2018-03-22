<?php

namespace App\Tests\Controller\Task;

use App\Controller\Task\TaskDTO;
use App\Controller\Task\TaskFacade;
use App\Entity\Project;
use App\Entity\Task;
use App\Repository\ProjectRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class TaskFacadeTest
 */
class TaskFacadeTest extends TestCase
{
    /**
     * @test
     */
    public function isTaskWithProjectCreated(): void
    {
        $project = new Project('Project subject');
        $repository = $this->createMock(ProjectRepository::class);
        $repository->method('find')->willReturn($project);

        $facade = new TaskFacade($repository);

        $dto = TaskDTO::create(['subject' => 'Task subject', 'project' => 1]);
        $task = $facade->create($dto);

        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals('Project subject', $task->projectSubject());
    }
}
