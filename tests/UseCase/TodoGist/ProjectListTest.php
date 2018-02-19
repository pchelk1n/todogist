<?php

namespace App\Tests\UseCase\TodoGist;

use App\Entity\Task;
use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\UseCase\Project\TaskDTO;
use App\UseCase\Project\ProjectDTO;
use App\UseCase\Project\ProjectList;
use PHPUnit\Framework\TestCase;

/**
 * Class TodoGistListTest
 */
class ProjectListTest extends TestCase
{
    /**
     * @test
     */
    public function isCorrectExecute(): void
    {
        $project = new Project('List 1');
        $task = new Task('Task 1');
        $project->addTask($task);

        $repository = $this->createMock(ProjectRepository::class);
        $repository->method('getProjectsWithTasks')->willReturn([$project]);

        $useCase = new ProjectList($repository);
        $result = $useCase->execute();

        $this->assertCount(1, $result);
        $this->assertInstanceOf(ProjectDTO::class, $result[0]);
        $this->assertEquals('List 1', $result[0]->subject);
        $this->assertCount(1, $result[0]->tasks);
        $this->assertInstanceOf(TaskDTO::class, $result[0]->tasks[0]);
        $this->assertEquals('Task 1', $result[0]->tasks[0]->subject);
    }
}
