<?php

try {
    require_once "Item.php";
    require_once "Product.php";
    require_once "ShoppingCart.php";

    $product1 = new Product(1, "Mouse", 100);
    $product2 = new Product(2, "Notebook", 4000);

    $item1 = new Item($product1, 4, 10); // Total R$180,00
    $item2 = new Item($product2, 1, 10); // Total R$3.600,00

    $cart = new ShoppingCart();

    $cart->addItem($item1); // Adiciona mouse ao carrinho
    $cart->addItem($item2); // Adiciona notebook ao carrinho

    $cart->removeItem($item2); // Remove notebook do carrinho

    echo "Total de itens: " . $cart->numberOfItems(). PHP_EOL; // 1

    echo "Valor total R$" . $cart->getTotal(). PHP_EOL; // R$180

} catch (Exception $e) {
    echo "ERRO: " . $e->getMessage() . PHP_EOL;
}
?>