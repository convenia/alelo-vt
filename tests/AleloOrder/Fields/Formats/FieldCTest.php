<?php

namespace Convenia\AleloVt\Tests\Fields\Formats;

use Convenia\AleloVt\Fields\Formats\FieldC;
use Convenia\AleloVt\Tests\BaseTest;

/**
 * Class FieldCTest.
 */
class FieldCTest extends BaseTest
{
    public function test_format()
    {
        $expected = 'CUSTOM VALUE        ';

        $value = (new FieldC('custom value'))
            ->setLength('20')
            ->setPosition(1);

        $this->assertEquals($expected, $value->getValue());
        $this->assertEquals($expected, $value->__toString());
        $this->assertEquals(1, $value->getPosition());
    }
}
