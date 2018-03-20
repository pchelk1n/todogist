<?php

namespace App\UseCase\Projects;

use App\Entity\Project;

/**
 * Class ProjectDTO
 */
class ProjectDTO
{
    public $subject;
    public $countTasks;

    /**
     * @param Project $project
     *
     * @return ProjectDTO
     */
    public static function create(Project $project): self
    {
        $data = new self();
        $data->subject = $project->subject();
        $data->countTasks = $project->countTasks();

        return $data;
    }
}
