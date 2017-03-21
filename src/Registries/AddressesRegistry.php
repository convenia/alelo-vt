<?php

namespace Convenia\AleloVt\Registries;

use Convenia\AleloVt\Fields\Formats\FieldC;
use Convenia\AleloVt\Fields\Formats\FieldN;

/**
 * Class HeaderRegistry.
 */
class AddressesRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format' => FieldN::class,
            'position' => 1,
            'length' => 1,
            'defaultValue' => 1,
        ],
        'cnpj' => [
            'format' => FieldN::class,
            'position' => 2,
            'length' => 14,
            'rules' => [
                'required',
            ],
        ],
        'id' => [
            'format' => FieldN::class,
            'position' => 16,
            'length' => 3,
            'rules' => [
                'required',
            ],
        ],
        'street' => [
            'format' => FieldC::class,
            'position' => 19,
            'length' => 50,
            'rules' => [
                'required',
            ],
        ],
        'number' => [
            'format' => FieldC::class,
            'position' => 69,
            'length' => 15,
            'rules' => [
                'required',
            ],
        ],
        'complement' => [
            'format' => FieldC::class,
            'position' => 84,
            'length' => 20,
        ],
        'district' => [
            'format' => FieldC::class,
            'position' => 104,
            'length' => 35,
        ],
        'cep' => [
            'format' => FieldN::class,
            'position' => 139,
            'length' => 8,
            'rules' => [
                'required',
            ],
        ],
        'city' => [
            'format' => FieldC::class,
            'position' => 147,
            'length' => 30,
        ],
        'state' => [
            'format' => FieldC::class,
            'position' => 177,
            'length' => 2,
        ],
        'person' => [
            'format' => FieldC::class,
            'position' => 179,
            'length' => 45,
            'rules' => [
                'required',
            ],
        ],
        'blankSpace' => [
            'format' => FieldC::class,
            'position' => 224,
            'length' => 11,
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
