<?php

namespace Edbizarro\AleloOrder\Tests;

use Edbizarro\AleloOrder\AleloOrder;

/**
 * Class AleloOrderTest.
 */
class AleloOrderTest extends BaseTest
{
    public function testInstantiate()
    {
        $aleloOrder = new AleloOrder();

        $this->assertInstanceOf(AleloOrder::class, $aleloOrder);
    }
}
