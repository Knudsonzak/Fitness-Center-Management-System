<?php

require_once __DIR__ . '/Payment.php';

class CreditCardPayment extends Payment
{
    private string $cardNumber;
    private string $expiryDate;
    private string $cvv;

    public function __construct(float $amount, string $cardNumber, string $expiryDate, string $cvv)
    {
        parent::__construct($amount);
        $this->cardNumber = $cardNumber;
        $this->expiryDate = $expiryDate;
        $this->cvv = $cvv;
    }

    public function processPayment(): string
    {
        return "Credit card payment of $" . number_format($this->amount, 2) . " is processed.";
    }
}

?>
