<?php
namespace HeadInject\Utilities;

/**
 * Head Inject Calculator
 */
class Calculator
{

    /**
     * Return sum.
     *
     * @param string $input
     * @return integer
     */
    function sum($input = '10 20 30'): int
    {
        $numbers = preg_split('/\s+/', $input);
        $total = 0;
        foreach ($numbers as $number) {
            $total += $number;
        }
        return $total;
    }
}
