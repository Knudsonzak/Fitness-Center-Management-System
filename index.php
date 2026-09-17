<?php
require_once __DIR__ . "/classes/User.php";
require_once __DIR__ . "/classes/Member.php";
require_once __DIR__ . "/classes/Trainer.php";
require_once __DIR__ . "/classes/FitnessClass.php";
require_once __DIR__ . "/classes/Booking.php";
require_once __DIR__ . "/classes/Payment.php";
require_once __DIR__ . "/classes/CreditCardPayment.php";
require_once __DIR__ . "/classes/PayPalPayment.php";

$members = [
    new Member("Jordan Miles", "jordan@fitness.test"),
    new Member("Priya Shah", "priya@fitness.test"),
    new Member("Luis Rivera", "luis@fitness.test")
];

$trainers = [
    new Trainer("Aisha Khan", "aisha@fitness.test"),
    new Trainer("Marcus Lee", "marcus@fitness.test")
];

$classes = [
    new FitnessClass("Beginner Yoga", "Aisha Khan", 18.00, 3, 3),
    new FitnessClass("Strength Fundamentals", "Marcus Lee", 25.00, 2, 2),
    new FitnessClass("HIIT Express", "Marcus Lee", 22.50, 4, 4)
];

$bookingScenarios = [
    ["Jordan Miles", "Beginner Yoga", "Credit Card"],
    ["Priya Shah", "Strength Fundamentals", "PayPal"],
    ["Luis Rivera", "Beginner Yoga", "PayPal"]
];

foreach ($members as $member) {
    echo $member->viewProfile() . "<br>";
}

echo "<hr>";

foreach ($trainers as $trainer) {
    echo $trainer->viewProfile() . "<br>";
}

echo "<hr>";

foreach ($classes as $class) {
    echo $class->viewClassInfo() . "<br>";
}

echo "<hr>";

foreach ($bookingScenarios as $scenario) {
    $memberName = $scenario[0];
    $className = $scenario[1];
    $paymentType = $scenario[2];

    $member = current(array_filter($members, fn (Member $member) => $member->getName() === $memberName));
    $fitnessClass = current(array_filter($classes, fn (FitnessClass $fitnessClass) => $fitnessClass->getClassName() === $className));
    $payment = $paymentType === "Credit Card"
        ? new CreditCardPayment($fitnessClass->calculatePrice(), "TEST-CARD-4242", "12/28", "333")
        : new PaypalPayment($fitnessClass->calculatePrice(), $member->getEmail());

    $booking = $member->bookClass($fitnessClass, $payment);
    echo "Member: $memberName | Class: $className | " . $booking->confirmBooking() . "<br>";
}

echo "<hr>";

foreach ($classes as $fitnessClass) {
    echo $fitnessClass->viewClassInfo() . "<br>";
}

?>