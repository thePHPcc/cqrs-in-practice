<?php declare(strict_types=1);

namespace thephpcc\cqrs\departureboard;

use thephpcc\cqrs\Event;
use thephpcc\cqrs\FlightCancelledEvent;
use thephpcc\cqrs\FlightScheduledEvent;

class Projector
{
    private DepartureInformationBoard $board;

    public function __construct(DepartureInformationBoard $board)
    {
        $this->board = $board;
    }

    public function handle(Event $event): void
    {
        switch (get_class($event)) {

            case FlightScheduledEvent::class:
                assert($event instanceOf FlightScheduledEvent);
                $this->handleFlightScheduledEvent($event);
                break;

            case FlightCancelledEvent::class:
                assert($event instanceOf FlightCancelledEvent);
                $this->handleFlightCancelledEvent($event);
                break;
        }
    }

    private function handleFlightScheduledEvent(FlightScheduledEvent $event): void
    {
        $this->board->displayFlight(
            new Flight(
                $event->date(),
                $event->flightNumber(),
                $event->destination()
            )
        );
    }

    private function handleFlightCancelledEvent(FlightCancelledEvent $event): void
    {
        $this->board->cancelFlight($event->flightNumber());
    }
}
