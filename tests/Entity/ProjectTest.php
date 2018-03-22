<?php

namespace App\Tests\Entity;

use App\Entity\Task;
use App\Entity\Project;
use PHPUnit\Framework\TestCase;

/**
 * Test for TodoGist
 */
class ProjectTest extends TestCase
{
    /**
     * @test
     */
    public function isCorrectInstanceOf(): void
    {
        $this->assertInstanceOf(Project::class, new Project(''));
    }

    /**
     * @test
     */
    public function isSubjectCreatedFromConstructor(): void
    {
        $this->assertEquals('test', (new Project('test'))->subject());
    }

    /**
     * @test
     */
    public function isZeroTasks(): void
    {
        $this->assertEquals(0, (new Project(''))->countTasks());
    }

    /**
     * @test
     */
    public function isCorrectAddedTwoTasks(): void
    {
        $project = new Project('project subject');
        $task1 = new Task('1');
        $task2 = new Task('2');

        $project->addTask($task1);
        $project->addTask($task2);

        $tasks = $project->tasks();

        $this->assertCount(2, $tasks);
        $this->assertEquals(2, $project->countTasks());
        $this->assertEquals($project, $task1->project());
        $this->assertEquals($project, $task2->project());
        $this->assertEquals('project subject', $task1->projectSubject());
        $this->assertEquals('project subject', $task2->projectSubject());

        foreach ($tasks as $task) {
            $this->assertInstanceOf(Task::class, $task);
            $this->assertFalse($task->isComplete());
        }

        $this->assertEquals('1', $tasks[0]->subject());
        $this->assertEquals('2', $tasks[1]->subject());
    }
}
