<?php

class Pupil extends Person
{
    function __construct(string $name, int $age)
    {
        parent::__construct($name,$age);
    }
    public function isAdult(): bool
    {
        return $this->age > 18;
    }
}