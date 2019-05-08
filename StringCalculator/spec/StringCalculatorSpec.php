<?php

namespace spec;

use StringCalculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(StringCalculator::class);
    }

    function it_calculates_the_sum_of_string()
    {
        $this->add('1,2,3,5')->shouldReturn(11);
    }

    function it_finds_the_sum_of_one_number()
    {
        $this->add(5)->shouldReturn(5);
    }

    function it_returns_0_with_invalid_input()
    {
        $this->add('')->shouldReturn(0);
    }

    function it_can_use_new_line_as_delimiter()
    {
        $this->add("1\n2\n3\n5")->shouldReturn(11);
    }

    function it_ignores_numbers_higher_than_999()
    {
        $this->add('5,2,1244,12')->shouldReturn(19);
    }
}
