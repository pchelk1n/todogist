<?php

namespace App\Repository;

use App\Entity\TodoGist;
use Doctrine\ORM\EntityRepository;

/**
 * TodoGistRepository
 */
class TodoGistRepository extends EntityRepository
{

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
