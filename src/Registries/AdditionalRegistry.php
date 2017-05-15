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
        'motherName' => [
            'format' => FieldC::class,
            'position' => 31,
            'length' => 50,
            'rules' => [
                'required',
            ],
        ],
        'blankSpace' => [
            'format' => FieldC::class,
            'position' => 81,
            'length' => 154,
            'default' => '',
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
