<?php

namespace Scooter\Tests\Search;

use Scooter\Client\Client;
use Scooter\Search\Expr\Andx;
use Scooter\Search\Expr\Contains;
use Scooter\Search\Model\Query;
use Scooter\Tests\TestCase;

class BlankQueryTest extends TestCase
{
    public function testCanCreateBlankDefaultQuery()
    {
        $query = new Query();

        $this->assertEquals(
            $query->getJson(),
            '{}'
        );
    }
}
