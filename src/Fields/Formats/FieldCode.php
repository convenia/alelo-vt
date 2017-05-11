<?php

namespace Convenia\AleloVt\Fields\Formats;

use Convenia\AleloVt\Fields\Field;

/**
 * Class FieldC.
 */
class FieldCode extends Field
{
    /**
     * Return the formatted field.
     *
     * @return string
     */
    public function format()
    {
        $actualLength = $this->value->length();
        $this->value = $this->value->truncate($this->getLength());

        if ($actualLength < $this->getLength()) {
            $this->value = $this->value->padRight($this->getLength());
        }

        return $this->value;
    }
}
