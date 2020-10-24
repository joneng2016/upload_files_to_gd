<?php

namespace App\Log;

class Log {

    static public function info($message) {
        $date = new \DateTime();
        echo "[info] " . $date->format("Y-m-d H:i") . " {$message}\n";
    }

    static public function errorException($th) {
        $errorMessage = $th->getMessage();
        $date = new \DateTime();
        echo "[error] " . $date->format("Y-m-d H:i") . " {$errorMessage}\n";
    }

    static public function error($message) {
        $date = new \DateTime();
        echo "[error] " . $date->format("Y-m-d H:i") . " {$message}\n";
    }
}