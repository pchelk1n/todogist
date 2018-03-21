<?php

namespace App\Controller\Project;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ProjectDTO
 */
class ProjectDTO
{
    /**
     * @Assert\NotBlank()
     */
    public $subject;
}
