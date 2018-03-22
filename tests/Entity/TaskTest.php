<?php

namespace App\Tests\Entity;

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
    public function isCorrectInstanceOf(): void
    {
        $this->assertInstanceOf(Task::class, new Task(''));
    }

    /**
     * @test
     */
    public function isSubjectCreatedFromConstructor(): void
    {
        $this->assertEquals('test', (new Task('test'))->subject());
    }

    /**
     * @test
     */
    public function isNotCompletedFromConstructor(): void
    {
        $this->assertFalse((new Task(''))->isComplete());
    }

    /**
     * @test
     */
    public function isComplete(): void
    {
        $task = new Task('');
        $task->complete();

        $this->assertTrue($task->isComplete());
    }

    /**
     * @test
     */
    public function isProjectIsNull(): void
    {
        $task = new Task('');

        $this->assertNull($task->project());
        $this->assertEquals('', $task->projectSubject());
    }
}
