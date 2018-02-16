<?php

namespace App\Repository;

use App\Entity\TodoGist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * TodoGistRepository
 */
class TodoGistRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $manager
     */
    public function __construct(ManagerRegistry $manager)
    {
        parent::__construct($manager, TodoGist::class);
    }

    /**
     * @return TodoGist[]
     */
    public function getTodoGistsWithTasks(): array
    {
        return $this->createQueryBuilder('tg')
            ->join('tg.tasks', 'tasks')
            ->addSelect('tasks')
            ->getQuery()
            ->getResult();
    }
}
