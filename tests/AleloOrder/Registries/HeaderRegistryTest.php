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
            'name' => 'Razão Social de Teste',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
            'orderDate' => '05052016',
        ]);

        echo $header;exit;
    }
}
