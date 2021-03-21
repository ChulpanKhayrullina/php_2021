<?php
include "generator.php";

if (isset($_REQUEST["convert"])) {

    $data = $_REQUEST["data"];

    print ("1.");
    $separated_strings = explode("\n", $data);
    $json_array = convert_to_json($separated_strings);
    print_r(json_encode($json_array, JSON_PRETTY_PRINT));

    print ("<br />" . "<br />");

    print("2.");
    $json_data = [];
    $weights = [];

    foreach ($json_array["data"] as $item) {
        array_push($json_data, $item["text"]);
        array_push($weights, $item["weight"]);
    }

    $array = check_generator($weights, $json_data);
    print_r(json_encode($array, JSON_PRETTY_PRINT));

} else {
    include "hw4.html";
}

function count_sum_weight($separated_data) {
    $sum = 0;

    for ($i = 0; $i < count($separated_data); $i++) {
        $arr = explode(" ", $separated_data[$i]);
        $el = (int)end($arr);
        $sum += $el;
    }

    return $sum;
}

function convert_to_json($separated_data) {
    $weight = count_sum_weight($separated_data);
    $json_arr = ["sum" => $weight, "data" => []];

    for ($i = 0; $i < count($separated_data); $i++) {
        $arr = explode(" ", $separated_data[$i]);
        $el = (int)end($arr);
        $probability = (float)$el / $weight;
        array_push($json_arr["data"], ["text" => $separated_data[$i],
            "weight" => $el, "probability" => $probability]);
    }

    return $json_arr;
}

