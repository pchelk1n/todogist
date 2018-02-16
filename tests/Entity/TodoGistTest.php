<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\TodoGist;
use PHPUnit\Framework\TestCase;

/**
 * Test for TodoGist
 */
class TodoGistTest extends TestCase
{
    /**
     * @test
     */
    public function isCorrectInstanceOf(): void
    {
        $this->assertInstanceOf(TodoGist::class, new TodoGist(''));
    }

    /**
     * @test
     */
    public function isSubjectCreatedFromConstructor(): void
    {
        $this->assertEquals('test', (new TodoGist('test'))->subject());
    }

    /**
     * @test
     */
    public function isZeroTasks(): void
    {
        $this->assertEquals(0, (new TodoGist(''))->countTasks());
    }

    /**
     * @test
     */
    public function isCorrectAddedTwoTasks(): void
    {
        $todoGist = new TodoGist('');
        $task1 = new Task('1');
        $task2 = new Task('2');

        $todoGist->addTask($task1);
        $todoGist->addTask($task2);

        $tasks = $todoGist->tasks();

        $this->assertCount(2, $tasks);
        $this->assertEquals(2, $todoGist->countTasks());
        $this->assertEquals($todoGist, $task1->todoGist());
        $this->assertEquals($todoGist, $task2->todoGist());

        foreach ($tasks as $task) {
            $this->assertInstanceOf(Task::class, $task);
            $this->assertFalse($task->isComplete());
        }

        $this->assertEquals('1', $tasks[0]->subject());
        $this->assertEquals('2', $tasks[1]->subject());
    }
}
