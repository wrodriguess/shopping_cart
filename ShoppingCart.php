<?php

require_once "Item.php";
require_once "Product.php";

class ShoppingCart
{
    private array $items = [];

    public function __construct()
    {
        $this->items = [];
    }

    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function removeItem(Item $item): void
    {
        $index = array_search($item, $this->items);

        if ($index === false) {
            throw new Exception("Produto não existe no carrinho.");
        }

        unset($this->items[$index]);
    }

    public function listItems(): array
    {
        return $this->items;
    }

    public function numberOfItems(): int
    {
        return count($this->items);
    }

    public function getTotal(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->total();
        }

        return $total;
    }

    public function listProducts(): array
    {
        $products = [];

        foreach ($this->items as $item) {
            $products[] = $item->listProduct();
        }

        return $products;
    }

    public function changeQuantity($itemPosition, $newQuantity): void
    {
        $this->items[$itemPosition]->changeQuantity($newQuantity);
    }
}
