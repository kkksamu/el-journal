<?php

namespace Journal;

class Classroom 
{
    protected string $name;
    protected string $teacher;
    protected array $students = [];

    public function __construct (string $name, string $teacher)
    {
        $this->teacher = $teacher;

        $this->name = extension_loaded ('mbstring') ?
            mb_strtolower ($name) : (extension_loaded ('iconv') ?
                iconv_strtolower ($name) : strtolower ($name));
    }

    public function append (Student $student): self 
    {
        $this->students[] = $student;

        return $this;
    }

    public function getStudents (): array
    {
        return $this->students;
    }

    public function setStudents (array $students): self
    {
        $this->students = $students;

        return $this;
    }

    public function getLeaderboard (): array
    {
        $leaderboard = [];

        foreach ($this->students as $student)
            $leaderboard[] = $student->getMiddle ();

        arsort ($leaderboard);

        return $leaderboard;
    }
}
