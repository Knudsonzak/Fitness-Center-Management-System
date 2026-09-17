<?php

class Payment
{
    protected float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function processPayment(): string
    {
        return "Payment of $" . number_format($this->amount, 2) . " processed.";
    }
}

?>
