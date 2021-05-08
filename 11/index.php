<?php
require_once("Logger.php");
use logger\Logger;

if (isset($_POST["send"])) {
    $logger = new Logger("logger.txt");
    $logger -> log("emergency", "EMERGENCY");
    $logger -> log("alert", "ALERT");
    $logger -> log("critical", "CRITICAL");
} else {
    include "hw11.html";
}