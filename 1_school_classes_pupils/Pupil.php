<?php


class Pupil extends Person
{
    public function isAdult(): bool
    {
        return $this->age > 18;
    }
}