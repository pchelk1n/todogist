<?php

namespace App\Tests\UseCase\TodoGist;

use App\Entity\Task;
use App\Entity\TodoGist;
use App\Repository\TodoGistRepository;
use App\UseCase\TodoGist\TaskDTO;
use App\UseCase\TodoGist\TodoGistDTO;
use App\UseCase\TodoGist\TodoGistList;
use PHPUnit\Framework\TestCase;

/**
 * Class TodoGistListTest
 */
class TodoGistListTest extends TestCase
{
    /**
     * @test
     */
    public function isCorrectExecute(): void
    {
        $todoGist = new TodoGist('List 1');
        $task = new Task('Task 1');
        $todoGist->addTask($task);

        $repository = $this->createMock(TodoGistRepository::class);
        $repository->method('getTodoGistsWithTasks')->willReturn([$todoGist]);

        $useCase = new TodoGistList($repository);
        $result = $useCase->execute();

        $this->assertCount(1, $result);
        $this->assertInstanceOf(TodoGistDTO::class, $result[0]);
        $this->assertEquals('List 1', $result[0]->subject);
        $this->assertCount(1, $result[0]->tasks);
        $this->assertInstanceOf(TaskDTO::class, $result[0]->tasks[0]);
        $this->assertEquals('Task 1', $result[0]->tasks[0]->subject);
    }
}
