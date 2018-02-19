<?php

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * ProjectRepository
 */
class ProjectRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $manager
     */
    public function __construct(ManagerRegistry $manager)
    {
        parent::__construct($manager, Project::class);
    }

    /**
     * @return Project[]
     */
    public function getProjectsWithTasks(): array
    {
        return $this->createQueryBuilder('project')
            ->join('project.tasks', 'tasks')
            ->addSelect('tasks')
            ->getQuery()
            ->getResult();
    }
}
