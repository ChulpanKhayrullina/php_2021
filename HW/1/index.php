<?php

if (isset($_REQUEST["submit"])) {
    $code = $_REQUEST["brainfuck_code"];
    $parameter = $_REQUEST["parameter"];

    $code_str = str_split($code);
    $parameter_str = str_split($parameter);

    check($code_str, $parameter_str);
} else {
    include ("hw_1.html");
}

function check ($code_str, $parameter_str) {
    $current = 0;
    $result = array(0);
    $param = 0;

    $opened_brackets = 0;
    $closed_brackets = 0;

    for ($i = 0; $i < count($code_str); ++$i) {
        switch ($code_str[$i]) {
            case ">" :
                $current++;

                if (!isset($result[$current])) {
                    $result[$current] = 0;
                }

                break;
            case "<" :
                $current--;

                if (!isset($result[$current])) {
                    $result[$current] = 0;
                }

                break;
            case "+" :
                $result[$current]++;
                break;
            case "-" :
                $result[$current]--;
                break;
            case "." :
                print(chr($result[$current]));
                break;
            case "," :
                $result[$current] = ord($parameter_str[$param]);
                $param++;
                break;
            case "[" :
                if ($result[$current] == 0) {
                    $opened_brackets++;

                    while ($opened_brackets != 0) {
                        $i++;

                        if ($code_str[$i] == "[") {
                            $opened_brackets++;
                        } else if ($code_str[$i] == "]") {
                            $opened_brackets--;
                        }
                    }
                }

                break;
            case "]" :
                if ($result[$current] != 0) {
                    $closed_brackets++;

                    while ($closed_brackets != 0) {
                        $i--;

                        if ($code_str[$i] == "]") {
                            $closed_brackets++;
                        } else if ($code_str[$i] == "[") {
                            $closed_brackets--;
                        }
                    }
                }

                break;
        }
    }
}