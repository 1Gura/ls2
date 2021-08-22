<?php
require_once 'go_shop_classes/Shop.php';
require_once 'go_shop_classes/Client.php';
require_once 'go_shop_classes/Product.php';
$clients = [
    new Client(1000),
    new Client(2000),
    new Client(3000),
];
$shop = new Shop();
$shop->addProduct(new Product('Стул', 999));
$shop->addProduct(new Product('Стол', 2999));
$shop->addProduct(new Product('Стол2', 1111));
$shop->getProductsSortedByPrice();

foreach ($clients as $key => $client) {
    echo "Клиент $key встал в очередь, у него было денег: {$client->getMoney()} </br>";
    $product = $shop->getProductsSortedByPrice()[0];
    var_dump($product->getName());
    if ($client->canBuyProduct($product)) {
        $shop->sellProduct($product);
        $client->buyProduct($product);
        echo "Клиент $key купил товар {$product->getName()} за {$product->getPrice()}. У него осталось денег {$client->getMoney()} </br></br>";
    } else {
        echo "Клиент ничего не купил. У него осталось денег {$client->getMoney()}";
    }
}

echo "Магазин продал товара на {$shop->getMoney()}";


