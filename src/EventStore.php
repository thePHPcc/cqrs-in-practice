<?php declare(strict_types=1);

namespace thephpcc\cqrs;

interface EventStore
{
    public function store(Event $event): void;

    public function all(): array;

    public function commit(): void;
}
