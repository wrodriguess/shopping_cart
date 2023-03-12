<?php

class Product
{
    private int $id;
    private string $description;
    private float $price;

    public function __construct(int $id, string $description, float $price)
    {
        $this->ensureIdIsValid($id);
        $this->ensureDescriptionIsValid($description);
        $this->ensurePriceIsValid($price);

        $this->id = $id;
        $this->description = $description;
        $this->price = $price;
    }

    private function ensureIdIsValid(int $id): void
    {
        if ($id <= 0) {
            throw new Exception("Somente é permitida a criação de um produto com id positivo.");
        }
    }

    private function ensureDescriptionIsValid(string $description): void
    {
        if (strlen($description) < 3) {
            throw new Exception("Somente é permitida a criação de um produto com descrição 3 ou mais caracteres.");
        }
    }

    private function ensurePriceIsValid(float $price): void
    {
        if ($price <= 0) {
            throw new Exception("Somente é permitida a criação de um produto com preço positivo.");
        }
    }

    public function price(): float
    {
        return $this->price;
    }

    public function description(): string
    {
        return $this->description;
    }
}
