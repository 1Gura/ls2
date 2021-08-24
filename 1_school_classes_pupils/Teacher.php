<?php


class Teacher extends Person
{
    private $experience;
    function __construct(string $name, int $age, $experience)
    {
        parent::__construct($name,$age);
        $this->experience = $experience;
    }

    public function getExperience() {
        return $this->experience;
    }
}