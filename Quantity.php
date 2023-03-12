<?php

class Quantity
{
    private int $quantity;

    public function __construct(int $quantity)
    {
        $this->ensureQuantityIsValid($quantity);

        $this->quantity = $quantity;
    }

    private function ensureQuantityIsValid(int $quantity): void
    {
        if ($quantity < 1 || $quantity > 10) {
            throw new Exception("Somente é permitida a criação de um item com quantidade mínima de 1 produto e máxima de 10 produtos.");
        }
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function changeQuantity($newQuantity): void
    {
        $this->ensureQuantityIsValid($newQuantity);

        $this->quantity = $newQuantity;
    }
}