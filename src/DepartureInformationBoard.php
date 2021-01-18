<?php declare(strict_types=1);

namespace thephpcc\cqrs\departureboard;

class DepartureInformationBoard
{
    private array $flights = [];

    public function displayFlight(Flight $flight): void
    {
        $this->flights[$flight->number()] = $flight;
    }

    public function cancelFlight(string $flightNumber): void
    {
        $this->flights[$flightNumber] = $this->flights[$flightNumber]->cancel();

        // unset($this->flights[$flightNumber]);
    }

    // @todo sort by date asc
    // @todo limit max of number flights on the board

    public function asString(): string
    {
        $lines = [];

        foreach ($this->flights as $flight) {
            $columns = [];
            $columns[] = $flight->date()->format('H:i');
            $columns[] = $flight->number();
            $columns[] = $flight->destination();

            if ($flight->isCancelled()) {
                $columns[] = 'cancelled';
            }

            $lines[] = implode(' | ', $columns);
        }

        return implode(PHP_EOL, $lines);
    }
}
