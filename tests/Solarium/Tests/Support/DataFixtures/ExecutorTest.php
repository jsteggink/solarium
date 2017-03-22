<?php

namespace Solarium\Tests\Support\DataFixtures;

use PHPUnit\Framework\TestCase;
use Solarium\Support\DataFixtures\Executor;

class ExecutorTest extends TestCase
{
    public function testLoad()
    {
        $solarium = $this->createMock('Solarium\Core\Client\ClientInterface');

        $mockFixtures = array(
            $this->createMockFixture($solarium),
            $this->createMockFixture($solarium),
        );

        $executor = new Executor($solarium);
        $executor->execute($mockFixtures);
    }

    private function createMockFixture($client)
    {
        $fixture = $this->createMock('Solarium\Support\DataFixtures\FixtureInterface');
        $fixture->expects($this->once())
            ->method('load')
            ->with($client);

        return $fixture;
    }
}
