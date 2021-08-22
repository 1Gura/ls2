<?php
require_once 'go_shop_classes/HasMoney.php';

class Shop implements HasMoney
{
    private array $products = [];
    private int $money = 0;

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProductsSortedByPrice(): array
    {
        usort($this->products, 'sortPrice');
        return $this->products;
    }

    public function sellTheMostExpensiveProduct(Client $client)
    {
        $countProduct = count($this->products);
        $maxPriceProduct = $this->getProductsSortedByPrice()[$countProduct - 1];
        if ($client->canBuyProduct($maxPriceProduct)) {
            $this->sellProduct($maxPriceProduct);
            $client->buyProduct($maxPriceProduct);
        }


    }

    public function sellProduct(Product $product)
    {
        foreach ($this->products as $key => $item) {
            if ($item->getName() === $product->getName()) {
                $this->money += $product->getPrice();
                unset($this->products[$key]);
            }
        }
    }


    public function getMoney(): int
    {
        return $this->money;
    }
}

function sortPrice(Product $a, Product $b): int
{
    return $a->getPrice() <=> $b->getPrice();
}