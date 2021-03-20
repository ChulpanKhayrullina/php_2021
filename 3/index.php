<?php
if (isset($_REQUEST["submit"])) {
    $strings = $_REQUEST["strings"];
    $separate_strings = explode("\n", $strings);
    $sort_strings = sort_str($separate_strings);

    foreach ($sort_strings as $value) {
        echo $value . "<br />";

    }
} else {
    include "hw3.html";
}

function sort_str($separate_strings) {
    $sort_str = [];

    for ($i = 0; $i < count($separate_strings); $i++) {
        $separate_strings[$i] = explode(' ', $separate_strings[$i]);
        array_push($sort_str, $separate_strings[$i]);
        shuffle($separate_strings[$i]);
        array_push($sort_str, $separate_strings[$i]);
    }

    usort($sort_str, function ($n1, $n2){
        //здесь почему-то ругается на пробелы
       if ($n1[1] < $n2[1]) return -1;
       else return 1;
    });

    for ($i = 0; $i < count($sort_str); $i++) {
        $sort_str[$i] = implode(" ", $sort_str[$i]);
    }

    return $sort_str;
}
