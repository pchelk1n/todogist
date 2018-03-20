<?php

namespace App\Tests\Controller;

use App\Controller\MainPageController;
use App\UseCase\Projects\GetProjects;
use App\UseCase\Tasks\GetTasks;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class MainPageControllerTest
 */
class MainPageControllerTest extends TestCase
{
    /**
     * @test
     */
    public function runShowAction(): void
    {
        $templating = $this->createMock(EngineInterface::class);
        $getTasks = $this->createMock(GetTasks::class);
        $getProjects = $this->createMock(GetProjects::class);

        $templating->expects($this->once())->method('render');
        $getTasks->expects($this->once())->method('__invoke');
        $getProjects->expects($this->once())->method('__invoke');

        $controller = new MainPageController($templating);
        $controller->show($getTasks, $getProjects);
    }
}
