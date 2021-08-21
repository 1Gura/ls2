<?php


class School
{
    protected array $persons = [];
    protected array $classes = [];

    public function addPerson(Person $person)
    {
        $this->persons[] = $person;
    }

    public function addClass(SchoolClass $schoolClass)
    {
        $this->classes[] = $schoolClass;
    }

    public function personsSchoolCount(): int
    {
        return count($this->persons);
    }
}