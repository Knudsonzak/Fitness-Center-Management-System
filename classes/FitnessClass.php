<?php

class FitnessClass
{
    private string $className;
    private string $trainer;
    private float $price;
    private int $maximumCapacity;
    private int $availableSpots;

    public function __construct(string $className, string $trainer, float $price, int $maximumCapacity, int $availableSpots)
    {
        if ($price < 0 || $maximumCapacity < 0 || $availableSpots < 0 || $availableSpots > $maximumCapacity) {
            throw new InvalidArgumentException("Invalid fitness class values.");
        }

        $this->className = $className;
        $this->trainer = $trainer;
        $this->price = $price;
        $this->maximumCapacity = $maximumCapacity;
        $this->availableSpots = $availableSpots;
    }

    public function spaceIsAvailable(): bool
    {
        return $this->availableSpots > 0;
    }

    public function reserveSeat(): string
    {
        if ($this->spaceIsAvailable()) {
            $this->availableSpots--;
            return "Seat reserved for $this->className.";
        }

        return "No available seats left for $this->className.";
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getAvailableSpots(): int
    {
        return $this->availableSpots;
    }

    public function viewClassInfo(): string
    {
        return "Class: $this->className, Trainer: $this->trainer, Price: $" . number_format($this->price, 2) . ", Capacity: $this->maximumCapacity, Available Spots: $this->availableSpots";
    }

    public function calculatePrice(): float
    {
        return $this->price;
    }
}

?>