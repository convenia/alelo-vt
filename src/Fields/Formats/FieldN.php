<?php

namespace Edbizarro\Alelo\Fields\Formats;

use Edbizarro\Alelo\Fields\Field;

/**
 * Class FieldN
 */
class FieldN extends Field
{
    /**
     * Return the formatted field.
     *
     * @return string
     */
    public function format()
    {
        return $this->value;
    }
}
