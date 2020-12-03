<?php

namespace Task2\Tests;

use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    /**
     * @test
     * @dataProvider getSwapSamples
     */
    public function arraySwap(array $in, array $out, int $num)
    {
        array_swap($in, $num);
        $this->assertEquals($out, $in);
    }

    public function getSwapSamples()
    {
        return [
            [[10, 4, 5, 101, 6, 7, 8], [101, 4, 5, 10, 6, 7, 8], 3],
            [[1, 2, 4], [1, 2, 4], 0],
            [[10, 4, 5], [5, 4, 10], 2],
        ];
    }

    /**
     * @test
     * @dataProvider getSamples
     */
    public function selectionSort(array $in, array $out)
    {
        $this->assertEquals($out, selectionSort($in));
    }

    public function getSamples()
    {
        return [
            [[10, 4, 5, 101, 6, 7, 8], [4, 5, 6, 7, 8, 10, 101]],
            [[100, 4, 5, 101, 6, 7, 8], [4, 5, 6, 7, 8, 100, 101]],
            [[1001], [1001]],
            [[], []],
            [[2, 1], [1, 2]],
            [[2, 2, 2, 1], [1, 2, 2, 2]]
        ];
    }
}