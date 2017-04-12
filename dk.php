<?php
$number = 99;
$array = array(12, 13, 14, 16, 1, 71, 34, 42, 23, 25, 10, 15, 20, 6, 9, 17, 22, 3, 21, 4, 52, 62, 42, 11, 18, 24);

sort($array);
$arraySum = array_sum($array);
if ($arraySum == $number) {
    echo 'whole number sum is ' . $arraySum;
    exit();
}

function dk_power_set($array, $number) {
    $results = array(array());
    $posibilitySumArr = array();

    foreach ($array as $element) {
        if ($element > $number) {
            continue;
        }
        foreach ($results as $combination) {
            $mergeArr = array_merge(array($element), $combination);
            $sumOfMergeArr = array_sum($mergeArr);

            if ($sumOfMergeArr < $number) {
                array_push($results, $mergeArr);
            }
            $posibilityArr = checkSum($mergeArr, $number);

            if (!empty($posibilityArr)) {
                $posibilitySumArr[] = $posibilityArr;
            }
        }
    }
    return $posibilitySumArr;
}

$result = dk_power_set($array, $number);
if (!empty($result)) {
    $totalPos = end(array_keys($result)) + 1;
    echo '<br>';
    echo 'Total posibility:' . $totalPos;
    echo '<br>';
    echo '<pre>';
    print_r($result);
}

function checkSum($array, $number) {
    $posibiltyArr = array();
    $sum = array_sum($array);
    if ($sum == $number) {
        $posibiltyArr = $array;
    }
    return $posibiltyArr;
}
