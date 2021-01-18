<?php declare(strict_types=1);

namespace thephpcc\cqrs;

use DateTimeImmutable;

class FlightScheduledEvent implements Event
{
    private DateTimeImmutable $date;
    private string $number;
    private string $destination;

    public function __construct(
        DateTimeImmutable $date,
        string $number,
        string $destination
    )
    {
        $this->date = $date;
        $this->number = $number;
        $this->destination = $destination;
    }

    public function date(): DateTimeImmutable
    {
        return $this->date;
    }

    public function flightNumber(): string
    {
        return $this->number;
    }

    public function destination(): string
    {
        return $this->destination;
    }
}
