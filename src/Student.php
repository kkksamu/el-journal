<?php

namespace Journal;

class Student
{
    protected string $name;
    protected string $surname;
    protected int $age;
    
    protected array $subjects = [];

    public function __construct (string $name, string $surname, int $age)
    {
        $this->name    = $name;
        $this->surname = $surname;
        $this->age     = $age;
    }

    public static function new (string $name, string $surname, int $age): self
    {
        return new self ($name, $surname, $age);
    }

    public function getMarks (string $subject = null): ?Marks 
    {
        return $subject === null ? 
            $this->subjects : ($this->subjects[$subject] ?? null);
    }

    public function setMarks (string|array $subject, Marks $marks = null): self 
    {
        if ($marks !== null)
            $this->subjects[$subject] = $marks;

        else $this->subjects = $subject;

        return $this;
    }

    public function getMiddle (): ?float
    {
        $mid = $count = 0;

        foreach ($this->subjects as $marks)
            if ($marks->getMiddle () !== null)
            {
                $mid += $marks->getMiddle ();

                ++$count;
            } 
        
        return $count > 0 ? $mid / $count : null;
    }
}
