<?php


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
        usort($this->products, '$this->sortPrice');
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

    private function sellProduct(Product $product)
    {
        foreach ($this->products as $key => $item) {
            if ($item->getName() === $product->getName()) {
                unset($this->products[$key]);
            }
        }
    }

    function sortPrice(Product $a, Product $b): int
    {
        return $a->getPrice() <=> $b->getPrice();
    }


    public function getMoney(): int
    {
        return $this->money;
    }
}