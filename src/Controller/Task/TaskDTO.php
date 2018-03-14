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
}
