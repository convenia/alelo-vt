<?php

namespace Edbizarro\AleloOrder\Tests\Fields\Formats;

use Edbizarro\Alelo\Fields\Formats\FieldN;
use Edbizarro\AleloOrder\Tests\BaseTest;

/**
 * Class FieldNTest.
 */
class FieldNTest extends BaseTest
{
    public function test_format()
    {
        $expected = '0000000000000060000';

        $value = (new FieldN('600,00'))
            ->setLength('20')
            ->setPosition(1);

        $this->assertEquals($expected, $value->getValue());
        $this->assertEquals($expected, $value->__toString());
        $this->assertEquals(1, $value->getPosition());
    }
}
