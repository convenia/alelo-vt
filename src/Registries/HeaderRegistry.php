<?php

namespace Convenia\AleloVt\Registries;

use Convenia\AleloVt\Fields\Formats\FieldC;
use Convenia\AleloVt\Fields\Formats\FieldN;

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
            'format' => FieldN::class,
            'position' => 1,
            'length' => 1,
            'defaultValue' => 0,
        ],
        'orderDate' => [
            'format' => FieldN::class,
            'position' => 2,
            'length' => 8,
            'rules' => [
                'required',
                'date:dmY',
            ],
        ],
        'cnpj' => [
            'format' => FieldN::class,
            'position' => 10,
            'length' => 14,
            'rules' => [
                'required',
            ],
        ],
        'name' => [
            'format' => FieldC::class,
            'position' => 24,
            'length' => 50,
            'rules' => [
                'required',
            ],
        ],
        'blankSpaces' => [
            'format' => FieldC::class,
            'position' => 74,
            'length' => 157,
            'defaultValue' => '',
        ],
        'version' => [
            'format' => FieldN::class,
            'position' => 231,
            'length' => 2,
            'default' => 4,
        ],
        'release' => [
            'format' => FieldN::class,
            'position' => 233,
            'length' => 2,
            'defaultValue' => 00,
        ],
        'registryId' => [
            'format' => FieldN::class,
            'position' => 235,
            'length' => 6,
            'default' => 1,
            'rules' => [
                'required',
            ],
        ],
    ];
}
