<?php

namespace App\Tests\UseCase;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use App\UseCase\Projects\GetProjects;
use App\UseCase\Projects\ProjectDTO;
use PHPUnit\Framework\TestCase;

/**
 * Class GetProjectsTest
 */
class GetProjectsTest extends TestCase
{
    /**
     * @test
     */
    public function getProjects(): void
    {
        $project1 = new Project('Project 1');
        $project2 = new Project('Project 2');
        $repository = $this->createMock(ProjectRepository::class);
        $repository->method('findAll')->willReturn([$project1, $project2]);

        $useCase = new GetProjects($repository);
        $result = $useCase();
        $this->assertCount(2, $result);
        $this->assertInstanceOf(ProjectDTO::class, $result[0]);
        $this->assertEquals('Project 1', $result[0]->subject);
        $this->assertEquals('Project 2', $result[1]->subject);
    }
}
