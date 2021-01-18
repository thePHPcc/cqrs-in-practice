<?php declare(strict_types=1);

namespace thephpcc\cqrs;

class EventStoreStub implements EventStore
{
    private $events = [];

    public static function load(): self
    {
        return unserialize(
            file_get_contents(__DIR__ . '/../eventStore.serialized'),
            [
                EventStoreStub::class
            ]
        );
    }

    public function store(Event $event): void
    {
        $this->events[] = $event;
    }

    public function all(): array
    {
        return $this->events;
    }

    public function commit(): void
    {
        file_put_contents(__DIR__ . '/../eventStore.serialized', serialize($this));
    }
}
