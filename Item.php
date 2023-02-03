<?php

require_once "Product.php";

class Item
{
    private Product $product;
    private int $quantity;
    private float $discount;

    public function __construct(Product $product, int $quantity, float $discount)
    {
        $this->ensureQuantityIsValid($quantity);
        $this->ensureDiscountIsValid($discount);

        $this->product = $product;
        $this->quantity = $quantity;
        $this->discount = $discount;
    }

    private function ensureQuantityIsValid(int $quantity): void
    {
        if ($quantity < 1) {
            throw new Exception("Somente é permitida a criação de um item com quantidade mínima de 1 produto.");
        }
    }

    private function ensureDiscountIsValid(float $discount): void
    {
        if ($discount < 0 || $discount > 100) {
            throw new Exception("Desconto fora do intervalo permitido.");
        }
    }

    public function total(): float
    {
        $totalValue = $this->product->price() * $this->quantity;
        $discountInPercent = $this->discount / 100;
        $discountValue =  $totalValue * $discountInPercent;
        $discountedValue = $totalValue - $discountValue;

        return $discountedValue;
    }
}
