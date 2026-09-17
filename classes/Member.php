<?php

require_once __DIR__ . "/User.php";

class Member extends User{
    public function bookClass(FitnessClass $fitnessClass, Payment $payment): Booking{
        return new Booking($this, $fitnessClass, $payment);
    }
}

?>
