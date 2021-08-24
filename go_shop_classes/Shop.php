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
        usort($this->products, function (Product $a, Product $b) {
            return $a->getPrice() <=> $b->getPrice();
        });
        return $this->products;
    }

    public function sellTheMostExpensiveProduct(Client $client)
    {
        $productsBuyerCanBuy = $this->products;
        $this->products = [];

        foreach ($productsBuyerCanBuy as $product) {
            if($product->getPrice() <= $client->getMoney()) {
                $this->products[] = $product;
            }
        }
        $countProduct = count($this->products);
        if($countProduct > 0) {
            $maxPriceProduct = $this->getProductsSortedByPrice()[$countProduct - 1];
            if ($client->canBuyProduct($maxPriceProduct)) {
                $this->sellProduct($maxPriceProduct);
                $client->buyProduct($maxPriceProduct);
                $client->getBoughtProduct($maxPriceProduct);
            };
        }
        $this->products = $productsBuyerCanBuy;
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

