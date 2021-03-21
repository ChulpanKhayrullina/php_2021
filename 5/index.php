<?php
if (isset($_REQUEST["check"])) {
    $password = $_REQUEST["password"];

    $length = '/.{10}/';
    $required_two_symbols = '/(?=..*[0-9])(?=..*[%$#_*])(?=..*[a-z])(?=..*[A-Z])/';
    $three_near = '/ ([0-9]{4,})|([%$#_*]{4,})|([a-z]{4,})|([A-Z]{4,})/';

    if (preg_match($length, $password) && preg_match($required_two_symbols, $password) && (!preg_match($three_near, $password))) {
        print ("ПЕРФЕКТО!");
    } else {
        check_first_rule($length, $password);
        echo("<br/>" . "<br/>");
        check_second_rule($required_two_symbols, $password);
        echo("<br/>" . "<br/>");
        check_third_rule($three_near, $password);
    }
} else {
    include "hw5.html";
}

function check_first_rule($length, $password) {
    if (!preg_match($length, $password)) {
        print("Пароль должен содержать более 10 символов ;)");
    }
}

function check_second_rule($required_two_symbols, $password) {
    if (!preg_match($required_two_symbols, $password)) {
        print ("Пароль должен содержать хотя бы по 2 символа из каждой категории: -- ");

        if (!preg_match('/..*[0-9]/', $password)) {
            print (" проверьте наличие цифр ");
        }

        if (!preg_match('/..*[a-z]/', $password)) {
            print (" проверьте наличие строчных букв ");
        }

        if (!preg_match('/..*[A-Z]/', $password)) {
            print (" проверьте наличие прописных букв ");
        }

        if (!preg_match('/..*[%$#_*]/', $password)) {
            print (" проверьте наличие спец. символов ");
        }
    }

}

function check_third_rule($three_near, $password) {
    if (preg_match($three_near, $password)) {
        print ("Пароль не должен содержать более чем 3 символа любой категории подряд -- ");

        if (preg_match('/[0-9]{4,}/', $password)) {
            print (" проверьте цифры ");
        }

        if (preg_match('/[a-z]{4,}/', $password)) {
            print (" проверьте строчные буквы ");
        }

        if (preg_match('/[A-Z]{4,}/', $password)) {
            print (" проверьте прописные буквы ");
        }

        if (preg_match('/[%$#_*]{4,}/', $password)) {
            print (" проверьте спец. символы ");
        }
    }
}