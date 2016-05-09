<?php

namespace Edbizarro\AleloOrder\Registries;

/**
 * Class EmployeeRegistry.
 */
class EmployeeRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format'       => FieldN::class,
            'position'     => 1,
            'length'       => 1,
            'defaultValue' => 5,
        ],
        'monthValue' => [
            'format'       => FieldN::class,
            'position'     => 2,
            'length'       => 11,
            'defaultValue' => 5,
        ],
        'reserved1' => [
            'format'       => FieldC::class,
            'position'     => 13,
            'length'       => 1,
        ],
        'employeeRegistry' => [
            'format'       => FieldC::class,
            'position'     => 14,
            'length'       => 13,
        ],
        'reserved2' => [
            'format'       => FieldC::class,
            'position'     => 27,
            'length'       => 54,
            'defaultValue' => '',
        ],
        'birthDate' => [
            'format'       => FieldN::class,
            'position'     => 81,
            'length'       => 8,
            'rules'    => [
                'required',
                'date:dmY',
            ]
        ],
        'cpf' => [
            'format'   => FieldN::class,
            'position' => 89,
            'length'   => 11,
            'rules'    => [
                'required',
            ]
        ],
        'tmpField' => [
            'format'   => FieldN::class,
            'position' => 89,
            'length'   => 11,
            'rules'    => [
                'required',
            ]
        ],
    ];
}
