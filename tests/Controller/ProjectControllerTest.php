<?php

namespace App\Tests\Controller;

use App\Controller\Project\ProjectController;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Validator\Validation;

/**
 * Class ProjectControllerTest
 */
class ProjectControllerTest extends TestCase
{

    private $validator;

    protected function setUp()
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();
    }

    protected function tearDown()
    {
        unset($this->validator);
    }

    /**
     * @test
     */
    public function isFlushNotExecWithInvalidData(): void
    {
        $em = $this->createMock(EntityManagerInterface::class);
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')->willReturn('link');

        $em->expects($this->never())->method('flush');

        $controller = new ProjectController($this->validator, $em, $urlGenerator);

        $response = $controller->addProject(new Request([]));
        $this->assertEquals('link', $response->getTargetUrl());
    }

    /**
     * @test
     */
    public function isFlushExecWithValidData(): void
    {
        $em = $this->createMock(EntityManagerInterface::class);
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')->willReturn('link');

        $em->expects($this->once())->method('flush');

        $controller = new ProjectController($this->validator, $em, $urlGenerator);
        $controller->addProject(new Request(['subject' => 'title']));
    }
}
