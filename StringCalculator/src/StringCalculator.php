<?php

class StringCalculator
{
    /**
     * 1. StringCalcualtor::add('2,3,4);
     * 2. Empty = null
     * 3. Support multiple delimiters - , \n
     * 4. if a nummber bigger than 1000 ignore
     */

    protected $delimiters = [',', "\n"];
    const MAX_NUMBER_ALLOWED = 999;

    public function add($input_string)
    {
        $array = $this->makeArrayFromInput($input_string);
        $solution = 0;

        foreach ($array as $number) {
            $this->guardAgainstInvalidNumber($number);
            if ($number <= self::MAX_NUMBER_ALLOWED) {
                $solution += (int) $number;
            }
        }

        return $solution;
    }

    private function findDelimiter($input_string)
    {
        foreach ($this->delimiters as $delimiter) {
            if( strpos($input_string, $delimiter) == true) {
                return $delimiter;
            }
        }
        return false;
    }

    private function makeArrayFromInput($input_string)
    {
        if($delimiter = $this->findDelimiter($input_string)) {
            return explode($delimiter, $input_string);
        }

        return [$input_string];
    }

    private function guardAgainstInvalidNumber($number)
    {
        if($number < 0) {
            throw new InvalidArgumentException("Invalid number provided: {$number}.");
        }
    }


}
