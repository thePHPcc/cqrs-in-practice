<?php declare(strict_types=1);

namespace thephpcc\cqrs;

class FlightCancelledEvent implements Event
{
    private string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function flightNumber(): string
    {
        return $this->number;
    }
}
