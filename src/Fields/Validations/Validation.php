<?php

namespace Convenia\AleloOrder\Fields\Validations;

use Convenia\AleloOrder\Exceptions\ValidatorException;
use Convenia\AleloOrder\Exceptions\ValidatorInvalidRuleException;
use Stringy\Stringy;
use DateTime;

/**shouldStop
 * Class Validation.
 */
class Validation
{
    /**
     * Array of rules
     *
     * @var array
     */
    protected $rules;

    /**
     * Inform if the validator fails or not
     *
     * @var bool
     */
    protected $valid = true;

    /**
     * Validate the value based on rules
     *
     * @param array $rules
     */
    public function make(array $rules)
    {
        foreach ($rules as $ruleIndex => $rule) {
            if (!isset($rule['rules'])) {
                continue;
            }

            $this->rules[$ruleIndex] = $rule['rules'];
        }
    }

    /**
     * @param array $data
     * @throws ValidatorException
     * @throws ValidatorInvalidRuleException
     */
    public function validate(array $data)
    {
        if (count($this->rules) === 0) {
            return;
        }

        foreach ($this->rules as $ruleIndex => $rules) {
            foreach ($rules as $rule) {
                if (strpos($rule, ':') !== false) {
                    list($composeRuleIndex, $composeRuleParams) = explode(':', $rule);

                    $methodName = Stringy::create($composeRuleIndex);
                    $methodName = (string) $methodName->toTitleCase();

                    $this->methodExists($methodName);

                    $valid = $this->{'validate'.$methodName}($data, $ruleIndex, $composeRuleParams);

                    $this->shouldStop($valid, $composeRuleIndex, $ruleIndex, $data);
                    continue;
                }

                $methodName = Stringy::create($rule);
                $methodName = (string)$methodName->toTitleCase();
                $this->methodExists($methodName);

                $valid = $this->{'validate'.$methodName}($data, $ruleIndex);
                $this->shouldStop($valid, $rule, $ruleIndex, $data);
            }
        }
    }

    /**
     * Validate if the $ruleIndex is present
     *
     * @param $attributes
     * @param $ruleIndex
     *
     * @return bool
     */
    protected function validateRequired(array $attributes, $ruleIndex)
    {
        return array_key_exists($ruleIndex, $attributes);
    }

    /**
     * Validate if given string is a valid date format
     *
     * @param array $attributes
     * @param $ruleIndex
     * @param $ruleParams
     * @return bool
     */
    protected function validateDate(array $attributes, $ruleIndex, $ruleParams)
    {
        $dateFormat = $ruleParams;
        $dateValue = $attributes[$ruleIndex];

        $date = DateTime::createFromFormat($dateFormat, $dateValue);

        return $date && $date->format($dateFormat) === $dateValue;
    }

    /**
     * Check if method exists
     *
     * @param $methodName
     * @return bool
     * @throws \Convenia\AleloOrder\Exceptions\ValidatorInvalidRuleException
     */
    protected function methodExists($methodName)
    {
        if (method_exists($this, 'validate'.$methodName) === false) {
            throw new ValidatorInvalidRuleException($methodName);
        }
    }

    /**
     * @param $state
     * @param $rule
     * @param $field
     * @param $data
     *
     * @throws ValidatorException
     */
    protected function shouldStop($state, $rule, $field, $data = null)
    {
        if (isset($data[$field]) === false) {
            $data[$field] = '';
        }

        if ($state === false) {
            throw new ValidatorException('Rule "'.$rule. '" fails for field '.$field. '"'.$data[$field].'"');
        }
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }
}
