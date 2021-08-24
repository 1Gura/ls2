<?php
require_once 'go_shop_classes/HasMoney.php';

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
        if ($this->canBuyProduct($product)) {
            $this->money = $this->money - $product->getPrice();
            $this->product = $product;
        }
    }

    public function getBoughtProduct(): ?Product
    {
        return $this->product;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

}