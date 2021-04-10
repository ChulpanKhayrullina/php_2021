<?php
$rules = parse_ini_file("index.ini", true);
$data = fopen($rules["main"]["filename"], "r");
$symbols = [];
$symbols[] = $rules["first_rule"]["symbol"];
$symbols[] = $rules["second_rule"]["symbol"];
$symbols[] = $rules["third_rule"]["symbol"];

while (!feof($data)) {
    $string = fgets($data);

    if (startWith($string, $symbols[0])) {
        echo rule1($string, $rules["first_rule"]["upper"]);
    } elseif (startWith($string, $symbols[1])) {
        echo rule2($string, $rules["second_rule"]["direction"]);
    } elseif (startWith($string, $symbols[2])) {
        echo rule3($string, $rules["third_rule"]["delete"]);
    } else echo "ERROR - incorrect data";

    echo "<br>";
}

fclose($data);

function startWith($string, $startString) {
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function rule1($string, $upper): string {
    if ($upper == true || $upper == false) {
        if ($upper) return strtoupper($string);
        else return strtolower($string);
    } else return "You have broken 'upper' filed in index.ini";
}

function rule2($string, $direction): string {
    if ($direction === "+" || $direction === "-") {
        if ($direction === "+") {
            return strtr($string, "0123456789", "1234567890");
        } else {
            return strtr($string, "0123456789", "9012345678");
        }
    } else return "You have broken 'direction' filed in index.ini";
}

function rule3($string, $delete) {
    if (strlen($delete) === 1) return str_replace($delete, "", $string);
    else return "You have more than 1 char in 'delete' filed in index.ini";
}
