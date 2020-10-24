<?php

namespace App\Service;

use App\Artefacts\ContextGoogleDriveApiConnection;

class G {

    private $context;

    public function __construct() {
        $this->context = new ContextGoogleDriveApiConnection();
    }

    public function readCredentials() {
        $address = read_position_application() . "\credentials\credentials.json";
        $contentOfFile = read_file($address);
        
        $this->context->credentials = json_decode($contentOfFile);
    }

    public function startConnection() {
        dd(authTwoDotZero($this->context->credentials->installed));

    }
}