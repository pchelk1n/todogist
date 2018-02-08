<?php

namespace App\Entity;

/**
 * Class Task
 */
final class Task
{

    /**
     * @var string
     */
    private $subject;

    /**
     * @var bool
     */
    private $complete;

    /**
     * @param string $subject
     */
    public function __construct(string $subject)
    {
        $this->subject = $subject;
        $this->complete = false;
    }

    /**
     * @return string
     */
    public function subject(): string
    {
        return $this->subject;
    }

    /**
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->complete;
    }

    /**
     * Complete the task
     */
    public function complete(): void
    {
        $this->complete = true;
    }
}
