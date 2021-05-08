<?php
namespace logger;

use loggerInterface\LoggerInterface;

require "LoggerInterface.php";

class Logger implements LoggerInterface {
    public $arr_json = [];
    public $filePath;
    public $file;

    public function __construct($filePath) {
        $this -> filePath = $filePath;
        $this -> file = fopen($this -> filePath, 'a');
    }

    function __destruct() {
        $json = json_encode($this -> arr_json, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        fwrite($this -> file, $json);
        fclose($this -> file);
    }

    public function log($level, $message, array $context = []) {
        switch ($level) {
            case "emergency":
                $this -> emergency($message, $context);
                break;
            case "alert":
                $this -> alert($message, $context);
                break;
            case "critical":
                $this -> critical($message, $context);
                break;
            case "error":
                $this -> error($message, $context);
                break;
            case "warning":
                $this -> warning($message, $context);
                break;
            case "notice":
                $this -> notice($message, $context);
                break;
            case "info":
                $this -> info($message, $context);
                break;
            case "debug":
                $this -> debug($message, $context);
                break;
            default:
                echo "No info";
        }
    }

    public function emergency($message, array $context = []) {
        $this -> createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    public function alert($message, array $context = []) {
        $this -> createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    public function critical($message, array $context = []) {
        $this -> createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    public function error($message, array $context = []) {
        $this -> createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    public function warning($message, array $context = []) {
        $this -> createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    public function notice($message, array $context = []) {
        $this -> createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    public function info($message, array $context = []) {
        $this -> createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    public function debug($message, array $context = []) {
        $this -> createJson(__CLASS__." ".__FUNCTION__, $message);
    }

    private function createJson($level, $message) {
        $info = ['date' => date("d.m.y G:i:s:u T"), 'type' => $level, 'content' => $message];
        array_push($this -> arr_json, $info);
    }
}