<?php
include_once "FileLogger.php";
include_once "BrowserLogger.php";

if (isset($_REQUEST["ok"])) {
    $string = $_REQUEST["str"];

    for ($i = 1; $i <= 2; $i++) {
        if (isset($_REQUEST[$i])) {
            $logger = $_REQUEST[$i];
        }
    }

    $count = countOfUpperLetters($string);
    checkLogger($count);

    switch ($logger) {
        case "file":
            $filename = $_REQUEST["filename"];
            $res = new FileLogger($filename);
            $res->writeString($string);

            print("<br>");
            print ("Проверьте файл - ".$filename);
            break;

        case "browser":
            $type = "";

            for ($i = 11; $i <= 13; $i++) {
                if (isset($_REQUEST[$i])) {
                    $type = $_REQUEST[$i];
                }
            }

            $res = new BrowserLogger($type);
            $res -> writeString($string);
            break;

        default:
            print("Пожалуйста, выберите логгер");
    }
} else {
    include "hw9.html";
}

function countOfUpperLetters($string) : int {
    $count = strlen(preg_replace('/[^A-ZА-ЯЁ]/', '', $string));
    return $count;
}

function checkLogger($count) {
    echo("Кол-во заглавных букв - ". $count);
    print("<br>");
}