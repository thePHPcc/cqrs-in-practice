<?php declare(strict_types=1);

namespace thephpcc\cqrs\departureboard;

require __DIR__ . '/src/autoload.php';

$board = new DepartureInformationBoard;

$board->displayFlight(
    new Flight(
        new \DateTimeImmutable('2021-01-18 11:55'),
        'LH 414',
        'Washington'
    )
);

$board->displayFlight(
    new Flight(
        new \DateTimeImmutable('2021-01-18 13:05'),
        'AF 040',
        'Paris'
    )
);

$board->cancelFlight('AF 040');

print $board->asString() . PHP_EOL;
