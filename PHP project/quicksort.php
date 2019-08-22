<?php


$num = array(3, 7, 1, 26, 43, 12, 6, 21, 23, 73);

function quicksort($array)
{
    if (count($array) == 0)
        return array();

    $pivot = $array[0];
    $left_element = $right_element = array();

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot)
            $left_element[] = $array[$i];
        else
            $right_element[] = $array[$i];
    }

    return array_merge(quicksort($left_element), array($pivot), quicksort($right_element));
}

$sorted_numbers = quicksort($num);


print_r($sorted_numbers);
?>
