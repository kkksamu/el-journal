<?php

namespace Journal;

class Marks
{
    protected array $marks = [];

    public function __construct (array $marks)
    {
        $this->marks = $marks;
    }

    public static function new (array $marks): self
    {
        return new self ($marks);
    }

    public function append (Mark $mark): self
    {
        $this->marks[] = $mark;

        return $this;
    }

    public function getMarks ()
    {
        return $this->marks;
    }

    public function setMarks (array $marks): self
    {
        $this->marks = $marks;

        return $this;
    }

    public function getMiddle (): ?float
    {
        if (sizeof ($this->marks) == 0)
            return null;

        $sum = 0;
        
        foreach ($this->marks as $mark)
            $sum += $mark->mark;

        return $sum / sizeof ($this->marks);
    }
}
