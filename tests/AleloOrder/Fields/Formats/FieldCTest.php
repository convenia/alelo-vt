<?php

namespace Edbizarro\AleloOrder\Tests\Fields\Formats;

use Edbizarro\Alelo\Fields\Formats\FieldC;
use Edbizarro\AleloOrder\Tests\BaseTest;

/**
 * Class FieldCTest.
 */
class FieldCTest extends BaseTest
{
    public function test_format()
    {
        $expected = 'CUSTOM_VALUE        ';

        $value = (new FieldC('custom value'))
            ->setLength('20')
            ->setPosition(1);

        $this->assertEquals($expected, $value->getValue());
    }
}
