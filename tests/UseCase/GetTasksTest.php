<?php

namespace App\Tests\UseCase;

use App\Entity\Task;
use App\Repository\TaskRepository;
use App\UseCase\Tasks\GetTasks;
use App\UseCase\Tasks\TasksDTO;
use PHPUnit\Framework\TestCase;

/**
 * Class GetTasksTest
 */
class GetTasksTest extends TestCase
{
    /**
     * @test
     */
    public function getTasks(): void
    {
        $task1 = new Task('Task 1');
        $task2 = new Task('Task 2');
        $repository = $this->createMock(TaskRepository::class);
        $repository->method('findAll')->willReturn([$task1, $task2]);

        $useCase = new GetTasks($repository);
        $result = $useCase();
        $this->assertCount(2, $result);
        $this->assertInstanceOf(TasksDTO::class, $result[0]);
        $this->assertEquals('Task 1', $result[0]->subject);
        $this->assertEquals('Task 2', $result[1]->subject);
    }
}
