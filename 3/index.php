<?php
include("hw3.html");

if (!isset ($_REQUEST['text'])) {
    return;
}

$text = $_REQUEST['text'];
$strings = explode(PHP_EOL, $text);

for ($i = 0; $i < sizeof($strings); $i++) {
    $arr = explode(" ", $strings[$i]);
    shuffle($arr);
    $strings[$i] = implode(" ", $arr);
}

$all_strings = array_merge($strings, explode( PHP_EOL, $text));

function comparator ($str1, $str2) {
    return strcmp(explode(" ", $str1)[1], explode(" ", $str2)[1]);
}

uasort($all_strings, 'comparator');

foreach ($all_strings as $string) {
    echo $string."<br>";
}