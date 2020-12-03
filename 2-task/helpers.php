<?php

// В распоряжении есть функция `array_swap(&$arr, $num) { … }` которая меняем местами элемент на позиции `$num` и элемент на `0` позиции.
function array_swap(&$arr, int $num): void
{
    list($arr[$num], $arr[0]) = array($arr[0], $arr[$num]);
}

/**
 * @param int[] $list
 * @return int[]
 */
function selectionSort(array $list): array
{
    $len = count($list);
    for ($i = $len - 1; $i > 0; $i--) {
        if ($i !== $len - 1) {
            array_swap($list, $i + 1);
        }

        $max = $i;
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($list[$j] > $list[$max]) {
                $max = $j;
            }
        }
        array_swap($list, $max);
    }

    if ($len > 1) {
        array_swap($list, 1);
    }

    return $list;
}