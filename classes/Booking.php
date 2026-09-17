<?php

class Booking
{
    private Member $member;
    private FitnessClass $fitnessClass;
    private Payment $payment;
    private string $bookingStatus = "Pending";

    public function __construct(Member $member, FitnessClass $fitnessClass, Payment $payment)
    {
        $this->member = $member;
        $this->fitnessClass = $fitnessClass;
        $this->payment = $payment;
    }

    public function confirmBooking(): string
    {
        if ($this->bookingStatus === "Confirmed") {
            return "Booking is already confirmed.";
        }

        if (!$this->fitnessClass->spaceIsAvailable()) {
            return "Booking could not be confirmed: no available seats left for " . $this->fitnessClass->getClassName() . ".";
        }

        if (abs($this->payment->getAmount() - $this->fitnessClass->calculatePrice()) > 0.00001) {
            return "Booking could not be confirmed: payment amount does not match the class price.";
        }

        $this->fitnessClass->reserveSeat();
        $this->bookingStatus = "Confirmed";
        return "Booking confirmed for " . $this->member->getName() . ". " . $this->payment->processPayment();
    }

    public function getBookingStatus(): string
    {
        return $this->bookingStatus;
    }
}

?>