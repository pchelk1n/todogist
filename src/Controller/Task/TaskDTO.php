<?php

namespace App\Controller\Task;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TaskDTO
 */
class TaskDTO
{
    /**
     * @Assert\NotBlank()
     */
    public $subject;
    public $projectId;

    /**
     * @param array $data
     *
     * @return TaskDTO
     */
    public static function create(array $data): self
    {
        $dto = new self();
        $dto->subject = $data['subject'] ?? null;
        $dto->projectId = $data['project'] ?? null;

        return $dto;
    }
}
