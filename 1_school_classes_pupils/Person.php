<?php


abstract class Person
{
    public string $name;
    protected int $age;

    public function getAge(): int
    {
        return $this->age;
    }

    public function getName(): string
    {
        return $this->name;
    }
}