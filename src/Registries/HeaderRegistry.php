<?php

namespace Edbizarro\AleloOrder\Registries;

use Edbizarro\Alelo\Fields\Formats\FieldN;

/**
 * Class HeaderRegistry.
 */
class HeaderRegistry extends Registry
{
    /**
     * Header type = 0
     *
     * @var int
     */
    protected $type = 0;

    /**
     * @var array
     */
    protected $defaultFields = [
        'registryType' => [
            'format' => FieldN::class,
            'required' => false,
            'length' => 1,
            'position' => 1,
        ],
        'orderDate' => [
            'format' => FieldN::class,
            'required' => false,
            'length' => 8,
            'position' => 2,
        ],
    ];
}
