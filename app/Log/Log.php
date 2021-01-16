<?php

namespace App\Log;

class Log {

    public static $instance;
    
    private function __construct() {}

    static public function start() {

        if (self::$instance == null) {
            self::$instance = new Log();
            return self::$instance;
        }

        return self::$instance;

    }

    public function info($message) {
        $date = new \DateTime();
        echo "[info] " . $date->format("Y-m-d H:i") . " {$message}\n";
    }

    public function errorException($th) {
        $errorMessage = $th->getMessage();
        $date = new \DateTime();
        echo "[error] " . $date->format("Y-m-d H:i") . " {$errorMessage}\n";
    }

    public function error($message) {
        $date = new \DateTime();
        echo "[error] " . $date->format("Y-m-d H:i") . " {$message}\n";
    }
}