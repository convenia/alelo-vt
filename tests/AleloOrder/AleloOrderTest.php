<?php

namespace Convenia\AleloVt\Tests;

use Convenia\AleloVt\AleloVt;

/**
 * Class AleloVtTest.
 */
class AleloOrderTest extends BaseTest
{
    public function test_instantiate()
    {
        $AleloVt = new AleloVt(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',

            ]
        );

        $this->assertInstanceOf(AleloVt::class, $AleloVt);
    }

    public function test_add_address()
    {
        $AleloVt = new AleloVt(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
            ]
        );

        $registryAdd = $AleloVt->addAddress([
            'cnpj' => '05315684000134a',
            'id' => '154',
            'street' => 'Alameda Pamplona',
            'number' => '1427',
            'district' => 'jardim paulista',
            'cep' => '04527001',
            'state' => 'SP',
            'person' => 'José ninguém',
        ]);

        $this->assertTrue($registryAdd);
    }

    public function test_add_user()
    {
        $AleloVt = new AleloVt(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
            ]
        );

        $registryAdd = $AleloVt->addUser([
            'cnpj' => '05315684000134a',
            'addressId' => '154',
            'code' => '229247',
            'name' => 'José Alguem',
            'cpf' => '22924742804',
            'rg' => '42421196',
            'rgDigit' => '5',
            'rgState' => 'SSP',
            'birthDate' => '14071987',
            'workedDays' => 22,
        ]);
        $this->assertTrue($registryAdd);
    }

    public function test_add_benefit()
    {
        $AleloVt = new AleloVt(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
            ]
        );

        $registryAdd = $AleloVt->addBenefit([
            'cnpj' => '05315684000134a',
            'userCode' => '229247',
            'id' => '1',
            'name' => 'nome d o benefício',
            'quantity' => '2',
        ]);
        $this->assertTrue($registryAdd);
    }

    public function test_add_residence()
    {
        $AleloVt = new AleloVt(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
            ]
        );

        $registryAdd = $AleloVt->addResidence([
            'cnpj' => '05315684000134a',
            'userCode' => '229247',
            'street' => 'Alameda Pamplona',
            'number' => '1427',
            'district' => 'jardim paulista',
            'cep' => '04527001',
            'state' => 'SP',

        ]);
        $this->assertTrue($registryAdd);
    }

    public function test_generate()
    {
        $AleloVt = new AleloVt(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
            ]
        );

        $AleloVt->addAddress([
            'cnpj' => '05315684000134a',
            'id' => '154',
            'street' => 'Alameda Pamplona',
            'number' => '1427',
            'district' => 'jardim paulista',
            'cep' => '04527001',
            'state' => 'SP',
            'person' => 'José ninguém',
        ]);

        $AleloVt->addUser([
            'cnpj' => '05315684000134a',
            'addressId' => '154',
            'code' => '229247',
            'name' => 'José Alguem',
            'cpf' => '22924742804',
            'rg' => '42421196',
            'rgDigit' => '5',
            'rgState' => 'SSP',
            'birthDate' => '14071987',
            'workedDays' => 22,
        ]);

        $AleloVt->addBenefit([
            'cnpj' => '05315684000134a',
            'userCode' => '229247',
            'id' => '1',
            'name' => 'nome d o benefício',
            'quantity' => '2',
        ]);

        $AleloVt->addResidence([
            'cnpj' => '05315684000134a',
            'userCode' => '229247',
            'street' => 'Alameda Pamplona',
            'number' => '1427',
            'district' => 'jardim paulista',
            'cep' => '04527001',
            'state' => 'SP',

        ]);

        $file = $AleloVt->generate();
        $this->assertNotNull($file);

//        $expected  = '009052016A001RAZAO SOCIAL LEGAL                 1748468900017000000000000000111280150000000000000021052016QUALQUERCOISA     007                                                                                                                                                                                                                                                                           000001';
//        $expected .= PHP_EOL;
//        $expected .= '1174846890001700000000000RAZAO SOCIAL LEGAL                 0000RAZAO SOCIAL LEGAL                                                         000000000000000000                                                                           000000000000000000                                                                           000000000000000000                                                   000002';
//        $expected .= PHP_EOL;
//        $expected .= '500000000330 1                                                                  08011985541452198051418757896    SSP                 SP    000000000000000M1                                             0000000000000                                                            MOTHER NATURE                       0000000000000000000000000000 08052016 FUNCIONARIO TESTE 01                          000003';
//        $expected .= PHP_EOL;
//        $expected .= '500000000330 2                                                                  08011985333843817691911225341    SSP                 SP    000000000000000F1                                             0000000000000                                                            MOTHER NATURE                       0000000000000000000000000000 08052016 FUNCIONARIO TESTE 02                          000004';
//        $expected .= PHP_EOL;
//        $expected .= '9000002000000000000660                                                                                                                                                                                                                                                                                                                                                                                    000005';

        //$this->assertEquals($expected, $file);
    }
}
