<?php

namespace Convenia\AleloVt\Registries;

use Convenia\AleloVt\Fields\Formats\FieldC;
use Convenia\AleloVt\Fields\Formats\FieldN;

/**
 * Class HeaderRegistry.
 */
class AdditionalRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format' => FieldN::class,
            'position' => 1,
            'length' => 1,
            'defaultValue' => 5,
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
        'street' => [
            'format' => FieldC::class,
            'position' => 31,
            'length' => 50,
            'rules' => [
                'required',
            ],
        ],
        'number' => [
            'format' => FieldC::class,
            'position' => 81,
            'length' => 15,
            'rules' => [
                'required',
            ],
        ],
        'complement' => [
            'format' => FieldC::class,
            'position' => 96,
            'length' => 20,
        ],
        'district' => [
            'format' => FieldC::class,
            'position' => 116,
            'length' => 35,
        ],
        'cep' => [
            'format' => FieldN::class,
            'position' => 151,
            'length' => 8,
            'rules' => [
                'required',
            ],
        ],
        'city' => [
            'format' => FieldC::class,
            'position' => 159,
            'length' => 30,
        ],
        'state' => [
            'format' => FieldC::class,
            'position' => 189,
            'length' => 2,
            'rules' => [
                'required',
            ],
        ],
        'suggestion' => [
            'format' => FieldC::class,
            'position' => 179,
            'length' => 45,
            'default' => 'N',
            'rules' => [
                'required',
            ],
        ],
        'total' => [
            'format' => FieldN::class,
            'position' => 192,
            'length' => 12,
            'default' => 'N',
        ],
        'blankSpace' => [
            'format' => FieldC::class,
            'position' => 204,
            'length' => 11,
            'rules' => [
                'required',
            ],
        ],
        'registryId' => [
            'format' => FieldN::class,
            'position' => 235,
            'length' => 6,
            'default' => 2,
            'rules' => [
                'required',
            ],
        ],

    ];
}
