<?php


class Client implements HasMoney
{
    private ?Product $product = null;
    protected int $money = 0;

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    public function canBuyProduct(Product $product): bool
    {
        return $this->money >= $product->getPrice();
    }

    public function buyProduct(Product $product)
    {
        $this->canBuyProduct($product) ?? $this->money - $product->getPrice();
    }

    public function getBoughtProduct(Product $product)
    {
        $this->product = $product;
    }

    public function getMoney(): int
    {
        return $this->money;
    }
}