<?php


class Product
{
    protected string $name;
    protected int $price;

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __construct($name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}