<?php

namespace Edbizarro\AleloOrder\Tests;

use Edbizarro\AleloOrder\AleloOrder;
use Edbizarro\AleloOrder\Registries\EmployeeRegistry;

/**
 * Class AleloOrderTest.
 */
class AleloOrderTest extends BaseTest
{
    public function test_instantiate()
    {
        $aleloOrder = new AleloOrder(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
                'contractNumber' => 123456,
                'benefitType' => '2', // 1 = AVV 2= RVV 3= CVV 4= NVV 5= FVV
                'orderType' => 1,
                'accrualMonth' => '052016',
                'custom' => 'qualquercoisa',
                'registryId' => 1
            ]
        );

        $this->assertInstanceOf(AleloOrder::class, $aleloOrder);
    }

    public function test_add_employee()
    {
        $aleloOrder = new AleloOrder(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
                'contractNumber' => 123456,
                'benefitType' => '2', // 1 = AVV 2= RVV 3= CVV 4= NVV 5= FVV
                'orderType' => 1,
                'accrualMonth' => '052016',
                'custom' => 'qualquercoisa',
                'registryId' => 1
            ]
        );

        $aleloOrder->addEmployee([
            'monthValue' => '10',
            'employeeRegistry' => '1',
            'birthDate' => '08011985',
            'cpf' => '54145219805',
            'identityType' => '1',
            'identityNumber' => '373817952',
            'identityIssuer' => 'SSP',
            'identityIssuerState' => 'SP',
            'gender' => '1',
            'maritalStatus' => '1',
            'motherName' => 'Mother Nature',
            'admissionDate' => '08052016',
            'name' => 'Firstname Lastname',
        ]);

        $this->assertCount(1, $aleloOrder->getAllEmployees());

        foreach ($aleloOrder->getAllEmployees() as $employee) {
            $this->assertInstanceOf(EmployeeRegistry::class, $employee);
        }
    }

    public function test_generate()
    {
        $aleloOrder = new AleloOrder(
            [
                'orderDate' => '09052016',
                'name' => 'Razão Social Legal',
                'cnpj' => '17484689000170',
                'contractNumber' => '00011128015',
                'benefitType' => '2', // 1 = AVV 2= RVV 3= CVV 4= NVV 5= FVV
                'orderType' => 1,
                'accrualMonth' => '052016',
                'custom' => 'qualquercoisa',
            ]
        );

        $aleloOrder->addEmployee(
            [
                'monthValue' => '330',
                'employeeRegistry' => '1',
                'birthDate' => '08011985',
                'cpf' => '54145219805',
                'identityType' => '1',
                'identityNumber' => '418757896',
                'identityIssuer' => 'SSP',
                'identityIssuerState' => 'SP',
                'gender' => 'm',
                'maritalStatus' => '1',
                'motherName' => 'Mother Nature',
                'admissionDate' => '08052016',
                'name' => 'Funcionário Teste 01',
            ]
        );
        $aleloOrder->addEmployee(
            [
                'monthValue' => '330',
                'employeeRegistry' => '2',
                'birthDate' => '08011985',
                'cpf' => '33384381769',
                'identityType' => '1',
                'identityNumber' => '911225341',
                'identityIssuer' => 'SSP',
                'identityIssuerState' => 'SP',
                'gender' => 'f',
                'maritalStatus' => '1',
                'motherName' => 'Mother Nature',
                'admissionDate' => '08052016',
                'name' => 'Funcionário Teste 02',
            ]
        );

        $file = $aleloOrder->generate();

        $expected  = '009052016A001RAZAO SOCIAL LEGAL                 1748468900017000000000000000111280150000000000000021052016QUALQUERCOISA     007                                                                                                                                                                                                                                                                           000001';
        $expected .= PHP_EOL;
        $expected .= '1174846890001700000000000RAZAO SOCIAL LEGAL                 0000RAZAO SOCIAL LEGAL                                                         000000000000000000                                                                           000000000000000000                                                                           000000000000000000                                                   000002';
        $expected .= PHP_EOL;
        $expected .= '500000000330 1                                                                  08011985541452198051418757896    SSP                 SP    000000000000000M1                                             0000000000000                                                            MOTHER NATURE                       0000000000000000000000000000 08052016 FUNCIONARIO TESTE 01                          000003';
        $expected .= PHP_EOL;
        $expected .= '500000000330 2                                                                  08011985333843817691911225341    SSP                 SP    000000000000000F1                                             0000000000000                                                            MOTHER NATURE                       0000000000000000000000000000 08052016 FUNCIONARIO TESTE 02                          000004';
        $expected .= PHP_EOL;
        $expected .= '9000002000000000000660                                                                                                                                                                                                                                                                                                                                                                                    000005';

        $this->assertEquals($expected, $file);
    }
}
