<?php

namespace Convenia\AleloVt\Tests\Registries;

use Convenia\AleloVt\Registries\UserRegistry;
use Convenia\AleloVt\Tests\BaseTest;

/**
 * Class EmployeeRegistryTest.
 */
class EmployeeRegistryTest extends BaseTest
{
    public function test_complete_fields()
    {
        $header = new UserRegistry(
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
                'name' => 'username',
                'registryId' => '123456',
            ]
        );

        $expected = '500000000010 1                                                                  08011985334022038711373817952    SSP                 SP    00000000000000011                                             0000000000000                                                            MOTHER NATURE                       0000000000000000000000000000 08052016 USERNAME                                      123456';

        $this->assertEquals($expected, (string) $header);
    }
}
