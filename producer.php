<?php declare(strict_types=1);

namespace thephpcc\cqrs\departureboard;

use thephpcc\cqrs\EventStoreStub;
use thephpcc\cqrs\FlightCancelledEvent;
use thephpcc\cqrs\FlightScheduledEvent;

require __DIR__ . '/src/autoload.php';

$eventStore = new EventStoreStub;

$eventStore->store(
    new FlightScheduledEvent(
        new \DateTimeImmutable('2021-01-18 11:55'),
        'LH 414',
        'Washington'
    )
);

$eventStore->store(
    new FlightScheduledEvent(
        new \DateTimeImmutable('2021-01-18 13:05'),
        'AF 040',
        'Paris'
    )
);

$eventStore->store(
    new FlightScheduledEvent(
        new \DateTimeImmutable('2021-01-18 14:15'),
        'OS 0815',
        'Vienna'
    )
);

$eventStore->store(
    new FlightCancelledEvent('AF 040')
);

$eventStore->commit();
