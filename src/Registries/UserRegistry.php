<?php

namespace Convenia\AleloVt\Registries;

use Convenia\AleloVt\Fields\Formats\FieldN;
use Convenia\AleloVt\Fields\Formats\FieldC;

/**
 * Class EmployeeRegistry.
 */
class UserRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format' => FieldN::class,
            'position' => 1,
            'length' => 1,
            'defaultValue' => 2,
        ],
        'cnpj' => [
            'format' => FieldN::class,
            'position' => 2,
            'length' => 14,
            'rules' => [
                'required',
            ],
        ],
        'addressId' => [
            'format' => FieldN::class,
            'position' => 16,
            'length' => 3,
            'rules' => [
                'required',
            ],
        ],
        'code' => [
            'format' => FieldC::class,
            'position' => 19,
            'length' => 15,
            'defaultValue' => 5,
            'rules' => [
                'required',
            ],
        ],
        'name' => [
            'format' => FieldC::class,
            'position' => 34,
            'length' => 50,
            'rules' => [
                'required',
            ],
        ],
        'cpf' => [
            'format' => FieldN::class,
            'position' => 84,
            'length' => 11,
            'rules' => [
                'required',
            ],
        ],
        'rg' => [
            'format' => FieldC::class,
            'position' => 95,
            'length' => 9,
            'rules' => [
                'required',
            ],
        ],
        'rgDigit' => [
            'format' => FieldC::class,
            'position' => 104,
            'length' => 2,
            'rules' => [
                'required',
            ],
        ],
        'rgState' => [
            'format' => FieldC::class,
            'position' => 106,
            'length' => 2,
            'rules' => [
                'required',
            ],
        ],
        'birthDate' => [
            'format' => FieldN::class,
            'position' => 108,
            'length' => 8,
            'rules' => [
                'required',
                'date:dmY',
            ],
        ],
        'department' => [
            'format' => FieldC::class,
            'position' => 116,
            'length' => 45,

        ],
        'job' => [
            'format' => FieldC::class,
            'position' => 161,
            'length' => 45,

        ],
        'workedDays' => [
            'format' => FieldN::class,
            'position' => 206,
            'length' => 003,
        ],
        'blankSpace' => [
            'format' => FieldC::class,
            'position' => 209,
            'length' => 26,
            'default' => '',
        ],
        'registryId' => [
            'format' => FieldN::class,
            'position' => 235,
            'length' => 6,
            'rules' => [
                'required',
            ],
        ],
    ];
}
