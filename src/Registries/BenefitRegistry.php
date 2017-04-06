<?php

namespace Convenia\AleloVt\Registries;

use Convenia\AleloVt\Fields\Formats\FieldN;
use Convenia\AleloVt\Fields\Formats\FieldC;

/**
 * Class BranchRegistry.
 */
class BenefitRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format' => FieldN::class,
            'position' => 1,
            'length' => 1,
            'defaultValue' => 3,
        ],
        'cnpj' => [
            'format' => FieldN::class,
            'position' => 2,
            'length' => 14,
            'rules' => [
                'required',
            ],
        ],
        'userCode' => [
            'format' => FieldC::class,
            'position' => 16,
            'length' => 15,
            'rules' => [
                'required',
            ],
        ],
        'id' => [
            'format' => FieldN::class,
            'position' => 31,
            'length' => 6,
            'rules' => [
                'required',
            ],
        ],
        'name' => [
            'format' => FieldC::class,
            'position' => 37,
            'length' => 50,
            'rules' => [
                'required',
            ],
        ],
        'value' => [
            'format' => FieldN::class,
            'position' => 87,
            'length' => 12,
        ],
        'quantity' => [
            'format' => FieldN::class,
            'position' => 99,
            'length' => 3,
            'rules' => [
                'required',
            ],
        ],
        'cardNumber' => [
            'format' => FieldC::class,
            'position' => 102,
            'length' => 25,
        ],
        'blankSpace' => [
            'format' => FieldC::class,
            'position' => 127,
            'length' => 108,
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
