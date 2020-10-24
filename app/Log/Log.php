<?php

namespace App\Log;

class Log {

    static public function info($message) {
        $date = new \DateTime();

        echo "[info] " . $date->format("Y-m-d H:i") . " {$message}\n";
    }

    static public function error($th) {
        $errorMessage = $th->getMessage();
        echo "[error] " . $date->format("Y-m-d H:i") . " {$errorMessage}\n";
    }
}