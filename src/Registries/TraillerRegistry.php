<?php

namespace Convenia\AleloVt\Registries;

use Convenia\AleloVt\Fields\Formats\FieldC;
use Convenia\AleloVt\Fields\Formats\FieldN;

/**
 * Class TraillerRegistry.
 */
class TraillerRegistry extends Registry
{
    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format' => FieldN::class,
            'position' => 1,
            'length' => 1,
            'defaultValue' => 9,
        ],
        'type1' => [
            'format' => FieldN::class,
            'position' => 2,
            'length' => 6,
            'rules' => [
                'required',
            ],
        ],
        'type2' => [
            'format' => FieldN::class,
            'position' => 8,
            'length' => 6,
            'rules' => [
                'required',
            ],
        ],
        'type3' => [
            'format' => FieldN::class,
            'position' => 14,
            'length' => 6,
            'rules' => [
                'required',
            ],
        ],
        'type4' => [
            'format' => FieldN::class,
            'position' => 20,
            'length' => 6,
            'rules' => [
                'required',
            ],
        ],
        'type5' => [
            'format' => FieldN::class,
            'position' => 26,
            'length' => 6,
            'rules' => [
                'required',
            ],
        ],
        'blankSpaces' => [
            'format' => FieldC::class,
            'position' => 32,
            'length' => 203,
            'defaultValue' => ' ',
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
