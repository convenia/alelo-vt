<?php

namespace Edbizarro\AleloOrder\Tests\Registries;

use Edbizarro\AleloOrder\Registries\EmployeeRegistry;
use Edbizarro\AleloOrder\Tests\BaseTest;

/**
 * Class EmployeeRegistryTest.
 */
class EmployeeRegistryTest extends BaseTest
{
    public function test_complete_fields()
    {
        $header = new EmployeeRegistry(
            [
                'monthValue' => '10',
                'employeeRegistry' => '1',
                'birthDate' => '08011985',
                'cpf' => '33402203871',
                'identityType' => '1',
                'identityNumber' => '373817952',
                'identityIssuer' => 'SSP',
                'identityIssuerState' => 'SP',
                'gender' => '1',
                'maritalStatus' => '1',
                'motherName' => 'Mother Nature',
                'admissionDate' => '08052016',
                'username' => 'username',
                'registryId' => '123456',
            ]
        );

        $expected = '500000000010 1                                                                  08011985334022038711373817952    SSP                 SP    00000000000000011                                             0000000000000                                                            MOTHER_NATURE                       0000000000000000000000000000 08052016 USERNAME                                      123456';

        $this->assertEquals($expected, (string)$header);
    }
}
