<?php

namespace Edbizarro\AleloOrder\Tests\Registries;

use Edbizarro\AleloOrder\Tests\BaseTest;
use Edbizarro\AleloOrder\Registries\HeaderRegistry;

/**
 * Class HeaderRegistryTest.
 */
class HeaderRegistryTest extends BaseTest
{
    /**
     * @expectedException \Edbizarro\AleloOrder\Exceptions\FieldNotExistsException
     * @throws \Edbizarro\AleloOrder\Exceptions\FieldNotExistsException
     */
    public function test_field_not_exists()
    {
        new HeaderRegistry([
            'invalid_field' => '1'
        ]);
    }

    public function test_fields()
    {
        $header = new HeaderRegistry([
            'orderDate' => '05052016',
            'name' => 'Razão',

        ]);

        $expected = '005052016A001RAZAO                              0000000000000000000000000000000000000000000000000000000000                  007                                                                                                                                                                                                                                                                           000000';

        $this->assertEquals($expected, (string)$header);
    }
}
