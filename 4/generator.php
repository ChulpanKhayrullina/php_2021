<?php

function check_generator($weights, $strings) {
    $result = array();
    $count = 0;
    $frequency = array_fill(0, count($strings),0);

    while ($count < 10000) {
        $generator = generator($weights, $strings);

        foreach ($generator as $item) {
            $index = array_search($item, $strings);
            $frequency[$index]++;
        }

        $count++;
    }

    for ($i = 0; $i < count($strings); $i++) {
        array_push($result, ["text" => $strings[$i],
            "count" => $frequency[$i], "calculated_probability" => $frequency[$i] / 10000]);
    }

    return $result;
}

function generator($weights, $strings) {
    $for_random = [];
    $sum = 0;

    for ($i = 0; $i < count($weights); $i++) {
        $sum += $weights[$i];

        while ($weights[$i] != 0) {
            array_push($for_random, $strings[$i]);
            $weights[$i]--;
        }
    }

    $rand = mt_rand(0, $sum);

    for ($i = 0; $i < count($for_random); $i++) {
        if ($rand == $i) {
            yield $for_random[$rand];
        }
    }
}