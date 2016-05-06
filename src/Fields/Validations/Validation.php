<?php

namespace Edbizarro\AleloOrder\Fields\Validations;

use Edbizarro\AleloOrder\Exceptions\ValidatorException;
use Edbizarro\AleloOrder\Exceptions\ValidatorInvalidRuleException;
use Stringy\Stringy;
use DateTime;

/**
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
                    $methodName = (string)$methodName->toTitleCase();

                    $this->methodExists($methodName);

                    $valid = $this->{'validate'.$methodName}($data, $ruleIndex, $composeRuleParams);

                    $this->shouldStop($valid, $composeRuleIndex, $ruleIndex);
                    continue;
                }

                $methodName = Stringy::create($rule);
                $methodName = (string)$methodName->toTitleCase();
                $this->methodExists($methodName);

                $valid = $this->{'validate'.$methodName}($data, $ruleIndex);
                $this->shouldStop($valid, $rule, $ruleIndex);
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

        $d = DateTime::createFromFormat($dateFormat, $dateValue);

        return $d && $d->format($dateFormat) === $dateValue;
    }

    /**
     * Check if method exists
     *
     * @param $methodName
     * @return bool
     * @throws \Edbizarro\AleloOrder\Exceptions\ValidatorInvalidRuleException
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
     * @throws ValidatorException
     */
    protected function shouldStop($state, $rule, $field)
    {
        if ($state === false) {
            throw new ValidatorException('Rule "'.$rule. '" fails for field '.$field);
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
