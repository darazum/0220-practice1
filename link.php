<?php
function minimizeArray(&$array, $maxValue, &$fixedElementsCount)
{
    $fixedElementsCount = 0;
    foreach ($array as $k => &$value) {
        if (!is_int($value) && !is_float($value)) {
            trigger_error('wrong value');
            return false;
        }
        if ($value > $maxValue) {
            $value = $maxValue;
            $fixedElementsCount++;
        }
    }
    unset($value);

    return $fixedElementsCount > 0;
}


$arr = [1, 5, 7, 17, 10, 82, 34, 2, 56];
//$newArr = minimizeArray($arr, 10, $count);
//var_dump([
//    'arr' => $arr,
//    'newArr' => $newArr
//]);
//
//var_dump($newArr);
//var_dump($count);

//$maxValue = 15;
//$newArray  = array_map(function($value) use ($maxValue) {
//    return $value > $maxValue ? $maxValue : $value;
//}, $arr);

array_walk($arr, function(&$value, $key) {
});


var_dump($arr);