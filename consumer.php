<?php declare(strict_types=1);

namespace thephpcc\cqrs\departureboard;

use thephpcc\cqrs\EventStoreStub;

require __DIR__ . '/src/autoload.php';

$eventStore = EventStoreStub::load();

$board = new DepartureInformationBoard;
$projector = new Projector($board);

foreach ($eventStore->all() as $event) {
    $projector->handle($event);
}

print $board->asString() . PHP_EOL;
