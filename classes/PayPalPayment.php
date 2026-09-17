<?php

require_once __DIR__ . '/Payment.php';

class PaypalPayment extends Payment
{
    private string $email;

    public function __construct(float $amount, string $email)
    {
        parent::__construct($amount);
        $this->email = $email;
    }

    public function processPayment(): string
    {
        return "Paypal payment of amount $" . number_format($this->amount, 2) . " has been processed.";
    }
}

?>
