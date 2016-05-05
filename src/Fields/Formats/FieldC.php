<?php

namespace Edbizarro\Alelo\Fields\Formats;

use Edbizarro\Alelo\Fields\Field;

/**
 * Class FieldC.
 */
class FieldC extends Field
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
            $this->value = $this->value->padRight($this->length);
        }

        return $this->value;
    }
}
