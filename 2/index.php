<?php
if (isset($_REQUEST['submit'])) {
    $str = $_REQUEST['str'];
    $result = change_symbols($str);
    $string = $result[0];
    $count = $result[1];
    print ("Сгенерированная строка - ".$string."   :   ");
    print ("Кол-во замен - ".$count);
} else {
    include("hw2.html");
}

function generate($str) {
    static $count = 0;

    for ($i = 0; $i < strlen($str); $i++) {
        switch ($str[$i]) {
            case "h":
                yield "4";
                $count++;
                break;
            case "l":
                yield "1";
                $count++;
                break;
            case "e":
                yield "3";
                $count++;
                break;
            case "o":
                yield "0";
                $count++;
                break;
            default:
                yield $str[$i];
        }
    }

    return $count;
}

function change_symbols($str) {
    $string = "";
    $generate = generate($str);

    foreach ($generate as $item) {
        $string .= $item;
    }

    $count = $generate -> getReturn();
    return [$string, $count];

}