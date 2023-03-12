<?php

class Discount
{
    private float $discount;

    public function __construct(float $discount)
    {
        $this->ensureDiscountIsValid($discount);

        $this->discount = $discount;
    }

    private function ensureDiscountIsValid(float $discount): void
    {
        if ($discount < 0 || $discount > 100) {
            throw new Exception("Desconto fora do intervalo permitido.");
        }
    }

    public function discount(){
        return $this->discount;
    }
}
