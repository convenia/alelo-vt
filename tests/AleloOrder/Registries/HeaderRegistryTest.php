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

    public function test_complete_fields()
    {
        $header = new HeaderRegistry(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
                'contractNumber' => 123456,
                'benefitType' => 'RVV',
                'orderType' => 1,
                'accrualMonth' => '052016',
                'custom' => 'qualquercoisa',
                'registryId' => 1
            ]
        );

        $expected = '005052016A001RAZAO_SOCIAL_COM_CARACTERES_INVALID05315684000134000000000000000012345600000000000000R1052016QUALQUERCOISA     007                                                                                                                                                                                                                                                                           000001';

        $this->assertEquals($expected, (string)$header);
    }
}
