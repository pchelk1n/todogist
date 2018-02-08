<?php

namespace App\Tests;

use App\Entity\Task;
use PHPUnit\Framework\TestCase;

/**
 * Class TaskTest
 */
class TaskTest extends TestCase
{

    /**
     * @test
     */
    public function isCorrectInstanceOf()
    {
        $this->assertInstanceOf(Task::class, new Task(''));
    }

    /**
     * @test
     */
    public function isSubjectCreatedFromConstructor()
    {
        $this->assertEquals('test', (new Task('test'))->subject());
    }

    /**
     * @test
     */
    public function isNotCompletedFromConstructor()
    {
        $this->assertEquals(false, (new Task(''))->isComplete());
    }

    /**
     * @test
     */
    public function isComplete()
    {
        $task = new Task('');
        $task->complete();

        $this->assertEquals(true, $task->isComplete());
    }
}
