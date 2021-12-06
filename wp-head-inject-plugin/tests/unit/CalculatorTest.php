<?php

use HeadInject\Utilities\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    /**
     * Testing the calculator.
     */
    protected $calculator;

    /**
     * Setup the tests.
     */
    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    /**
     * @test that it should calculate the sum of the numbers.
     */
    function it_should_calculate_head_inject_sum()
    {
        /**
         * Arrange
         */
        $input_string = ' 2 10d $# hell7o 25   \  5 5 ';

        /**
         * Act
         */
        $result = $this->calculator->sum($input_string);

        /**
         * Assert
         */
        $this->assertSame(47, $result);
    }
}
