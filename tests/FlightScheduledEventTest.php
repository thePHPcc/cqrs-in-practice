<?php declare(strict_types=1);

namespace thephpcc\cqrs\departureboard;

use DateTimeImmutable;
use thephpcc\cqrs\FlightScheduledEvent;
use PHPUnit\Framework\TestCase;

/**
 * @covers \thephpcc\cqrs\FlightScheduledEvent
 */
class FlightScheduledEventTest extends TestCase
{
    private DateTimeImmutable $date;
    private string $flightNumber;
    private string $destination;
    private FlightScheduledEvent $event;

    protected function setUp(): void
    {
        $this->date = new DateTimeImmutable('2021-01-18');
        $this->flightNumber = 'the-flight-number';
        $this->destination = 'the-destination';

        $this->event = new FlightScheduledEvent(
            $this->date,
            $this->flightNumber,
            $this->destination
        );
    }

    public function test_has_date()
    {
        $this->assertEquals($this->date, $this->event->date());
    }

    public function test_has_flight_number()
    {
        $this->assertEquals($this->flightNumber, $this->event->flightNumber());
    }

    public function test_has_destination()
    {
        $this->assertEquals($this->destination, $this->event->destination());
    }
}
