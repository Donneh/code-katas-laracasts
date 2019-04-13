<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use PrimeFactors;
use Prophecy\Argument;

class PrimeFactorsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PrimeFactors::class);
    }

    function it_returns_an_empty_array_for_1()
    {
        $this->generate(1)->shouldReturn([]);
    }

    function it_computes_the_prime_factor_of_2()
    {
        $this->generate(2)->shouldReturn([2]);
    }

    function it_computes_the_prime_factor_of_3()
    {
        $this->generate(3)->shouldReturn([3]);
    }

    function it_computes_the_prime_factor_of_4()
    {
        $this->generate(4)->shouldReturn([2, 2]);
    }

    function it_computes_the_prime_factor_of_5()
    {
        $this->generate(5)->shouldReturn([5]);
    }

    function it_computes_the_prime_factor_of_6()
    {
        $this->generate(6)->shouldReturn([2, 3]);
    }

    function it_computes_the_prime_factor_of_8()
    {
        $this->generate(8)->shouldReturn([2, 2, 2]);
    }

    function it_computes_the_prime_factor_of_9()
    {
        $this->generate(9)->shouldReturn([3, 3]);
    }

    function it_computes_the_prime_factor_of_100()
    {
        $this->generate(100)->shouldReturn([2,2,5,5]);
    }
}
