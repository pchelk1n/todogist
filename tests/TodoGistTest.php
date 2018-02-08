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
    public function isCorrectCountWithTwoTasks()
    {
        $todoGist = new TodoGist('');
        $task = new Task('');

        $todoGist->addTask($task);
        $todoGist->addTask($task);

        $this->assertEquals(2, $todoGist->countTasks());
    }
}
