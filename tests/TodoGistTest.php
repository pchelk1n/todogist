<?php

namespace App\Tests;

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
    public function isCorrectInstanceOf()
    {
        $this->assertInstanceOf(TodoGist::class, new TodoGist(''));
    }

    /**
     * @test
     */
    public function isSubjectCreatedFromConstructor()
    {
        $this->assertEquals('test', (new TodoGist('test'))->subject());
    }

    /**
     * @test
     */
    public function isZeroTasks()
    {
        $this->assertEquals(0, (new TodoGist(''))->countTasks());
    }

    /**
     * @test
     */
    public function isCorrectAddedTwoTasks()
    {
        $todoGist = new TodoGist('');
        $task1 = new Task('1');
        $task2 = new Task('2');

        $todoGist->addTask($task1);
        $todoGist->addTask($task2);

        $tasks = $todoGist->tasks();

        $this->assertCount(2, $tasks);
        $this->assertEquals(2, $todoGist->countTasks());

        foreach ($tasks as $task) {
            $this->assertInstanceOf(Task::class, $task);
            $this->assertFalse($task->isComplete());
        }

        $this->assertEquals('1', $tasks[0]->subject());
        $this->assertEquals('2', $tasks[1]->subject());
    }

    /**
     * @test
     */
    public function removeTask()
    {
        $todoGist = new TodoGist('');
        $task1 = new Task('1');
        $task2 = new Task('2');

        $todoGist->addTask($task1);
        $todoGist->addTask($task2);


        $this->assertTrue($todoGist->removeTask($task2));
        $this->assertEquals(1, $todoGist->countTasks());

        $tasks = $todoGist->tasks();
        $this->assertEquals('1', $tasks[0]->subject());
    }
}
