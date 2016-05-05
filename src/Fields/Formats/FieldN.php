<?php

namespace Edbizarro\Alelo\Fields\Formats;

use Edbizarro\Alelo\Fields\Field;

/**
 * Class FieldN.
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
        $actualLength = $this->value->length();
        $this->value = $this->value->truncate($this->length);

        if ($actualLength < $this->length) {
            $this->value = $this->value->padLeft($this->length, 0);
        }

        return $this->value;
    }
}
