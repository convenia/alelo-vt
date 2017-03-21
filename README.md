# integração Alelo com VT (Vale Transporte)

[![Latest Stable Version](https://poser.pugx.org/edbizarro/alelo-order/v/stable)](https://packagist.org/packages/edbizarro/alelo-order) 
[![Build Status](https://travis-ci.org/edbizarro/alelo-order.svg?branch=master)](https://travis-ci.org/edbizarro/alelo-order) 
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/43a70be70ece404490174211010856b6)](https://www.codacy.com/app/edbizarro/alelo-order?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=edbizarro/alelo-order&amp;utm_campaign=Badge_Grade) 
[![StyleCI](https://styleci.io/repos/60547523/shield)](https://styleci.io/repos/60547523) 
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/3d88c1a4-ae25-4a4c-b417-5cafd5bef6f8/mini.png)](https://insight.sensiolabs.com/projects/3d88c1a4-ae25-4a4c-b417-5cafd5bef6f8) 
[![License](https://poser.pugx.org/edbizarro/alelo-order/license)](https://packagist.org/packages/edbizarro/alelo-order)


Projeto de integração de Vale Transporte com a operadora ALELO

## Install

este projeto usa PHP 5.6 ou superior

```sh
$ composer require convenia/alelo-vt
```

## Como usar

> Instancair o objeto com os parametros obrigatórios
```php

$AleloVt = new AleloVt(
            [
                'orderDate' => '05052016',
                'name' => 'Razão Social Com Caracteres Inválidos',
                'cnpj' => '05315684000134',
            ]
        );
```
> adicionar endereços
```php
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
```
> adicionar usuarios do benefício
```php
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
```
> adicionar os beneficios
```php
        $AleloVt->addBenefit([
            'cnpj' => '05315684000134a',
            'userCode' => '229247',
            'id' => '1',
            'name' => 'nome d o benefício',
            'quantity' => '2',
        ]);
```
> adicionar os endereços residenciais
```php
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
```

## License

[MIT](LICENSE) © Richard Littauer