<?php

namespace Edbizarro\AleloOrder\Registries;

use Edbizarro\Alelo\Fields\Formats\FieldN;
use Edbizarro\Alelo\Fields\Formats\FieldC;

/**
 * Class HeaderRegistry.
 */
class HeaderRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 1,
            'length'   => 1,
            'defaultValue' => 0
        ],
        'orderDate' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 2,
            'length'   => 8,
        ],
        'channel' => [
            'format'   => FieldC::class,
            'required' => true,
            'position' => 10,
            'length'   => 4,
            'defaultValue' => 'A001',
        ],
        'name' => [
            'format'   => FieldC::class,
            'required' => true,
            'position' => 14,
            'length'   => 35,
        ],
        'cnpj' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 49,
            'length'   => 14,
        ],
        'cpf' => [
            'format'   => FieldN::class,
            'required' => false,
            'position' => 63,
            'length'   => 11,
        ],
        'contractNumber' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 74,
            'length'   => 11,
        ],
        'orderNumber' => [
            'format'   => FieldN::class,
            'required' => false,
            'position' => 85,
            'length'   => 6,
        ],
        'orderScheduleDate' => [
            'format'   => FieldN::class,
            'required' => false,
            'position' => 91,
            'length'   => 8,
        ],
        'benefitType' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 99,
            'length'   => 1,
        ],
        'orderType' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 100,
            'length'   => 1,
        ],
        'accrualMonth' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 101,
            'length'   => 6,
        ],
        'custom' => [
            'format'   => FieldC::class,
            'required' => true,
            'position' => 107,
            'length'   => 18,
        ],
        'layoutVersion' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 125,
            'length'   => 3,
            'defaultValue' => 7,
        ],
        'blankSpaces' => [
            'format'   => FieldC::class,
            'required' => true,
            'position' => 128,
            'length'   => 267,
        ],
        'registryId' => [
            'format'   => FieldN::class,
            'required' => true,
            'position' => 395,
            'length'   => 6,
        ],
        'returnCode' => [
            'format'   => FieldC::class,
            'required' => false,
            'position' => 401,
            'length'   => 50,
            'defaultValue' => '',
        ],
    ];
}
