<?php

require_once "Product.php";
require_once "Discount.php";
require_once "Quantity.php";

class Item
{
    private Product $product;
    private Quantity $quantity;
    private Discount $discount;

    public function __construct(Product $product, Quantity $quantity, Discount $discount)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->discount = $discount;
    }

    public function total(): float
    {
        $totalValue = $this->product->price() * $this->quantity->quantity();
        $discountInPercent = $this->discount->discount() / 100;
        $discountValue =  $totalValue * $discountInPercent;
        $discountedValue = $totalValue - $discountValue;

        return $discountedValue;
    }

    public function listProduct(): string
    {
        return 'Produto: '.$this->product->description().' - Valor unitário: R$'.$this->product->price(). PHP_EOL;
    }

    public function changeQuantity($newQuantity): void
    {
        $this->quantity->changeQuantity($newQuantity);
    }
}