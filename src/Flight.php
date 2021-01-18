<?php declare(strict_types=1);

namespace thephpcc\cqrs\departureboard;

use DateTimeImmutable;

class Flight
{
    private DateTimeImmutable $date;
    private string $number;
    private string $destination;
    private $isCancelled = false;

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

    public function cancel(): Flight
    {
        $flight = new Flight($this->date, $this->number, $this->destination);
        $flight->isCancelled = true;

        return $flight;
    }

    public function date(): DateTimeImmutable
    {
        return $this->date;
    }

    public function number(): string
    {
        return $this->number;
    }

    public function destination(): string
    {
        return $this->destination;
    }

    public function isCancelled(): bool
    {
        return $this->isCancelled;
    }
}
