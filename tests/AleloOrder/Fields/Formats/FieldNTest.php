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
        $expected = '00000000000000123456';

        $value = (new FieldN('123456'))
            ->setLength('20')
            ->setPosition(1);

        $this->assertEquals($expected, $value->getValue());
    }
}
