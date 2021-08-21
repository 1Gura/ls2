<?php


class SchoolClass
{
    private Teacher $teacher;
    protected array $pupils;

    public function addPupil(Pupil $newPupil)
    {
        $this->pupils[] = $newPupil;
    }

    public function __construct(Teacher $newTeacher)
    {
        $this->teacher = $newTeacher;
        $this->pupils = [];
    }
}