<?php declare(strict_types=1);

namespace thephpcc\cqrs;

use PHPUnit\Framework\TestCase;

/**
 * @covers \thephpcc\cqrs\HelloWorld
 */
class HelloWorldTest extends TestCase
{
    public function test_says_hello_world(): void
    {
        $this->assertEquals('Hello World', (new HelloWorld)->sayIt());
    }
}
