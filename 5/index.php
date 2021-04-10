<?php
include("hw5.html");

if (!isset ($_REQUEST['password'])) {
    return;
}

$password = $_REQUEST['password'];

if (check($password) === "correct") echo "ПЕРФЕКТ!";
else echo check($password);

function check($word): string {
    if(!preg_match("/.{10,}/", $word)) return "Пароль должен содержать не менее 10-ти символов";

    else if (!preg_match("/.*[a-z].*[a-z].*/",$word)) return "Пароль должен содержать хотя бы 2-е строчных буквы";

    else if (!preg_match("/.*[A-Z].*[A-Z].*/",$word)) return "Пароль должен содержать хотя бы 2-е прописных буквы";

    else if (!preg_match("/.*[0-9].*[0-9].*/",$word)) return "Пароль должен содержать хотя бы 2-е цифры";

    else if (!preg_match("/.*[%$#_*].*[%$#_*].*/",$word)) return "Пароль должен содержать хотя бы 2 специальных символа: %$#_*";

    else if (preg_match("/.*([a-z]{4,})|([A-Z]{4,})|([0-9]{4,})|([%$#_*]{4,}).*/",$word)) return "Пароль содержит более 3 символов одной категории подряд";

    else return "correct";
}