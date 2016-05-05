<?php

namespace Edbizarro\Alelo\Fields;

use Edbizarro\AleloOrder\Interfaces\FieldInterface;

/**
 * Class Field.
 */
abstract class Field implements FieldInterface
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Field constructor.
     *
     * @param $value
     */
    public function __construct($value = null)
    {
        $this->setValue($value);
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Return the formatted value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->format();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
