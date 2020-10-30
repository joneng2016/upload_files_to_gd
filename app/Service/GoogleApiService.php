<?php

namespace App\Service;

use App\Artefacts\ContextGoogleDriveApiConnection;

use GuzzleHttp\Client;

use Google_Client;
use Google_Service_Drive;

class GoogleApiService {

    private $context;

    public function __construct() {
        $this->context = new ContextGoogleDriveApiConnection();
    }

    public function startConnection() {

        $credentials = read_position_application() ."\credentials" . '\credentials.json';
        
        $this->context->client = new Google_Client();

        $this->context->client->setHttpClient(new Client(['verify' => false]));

        $this->context->client->setApplicationName('Google Drive API PHP Quickstart');
        $this->context->client->setScopes(Google_Service_Drive::DRIVE);
        $this->context->client->setAuthConfig($credentials);
        $this->context->client->setAccessType('offline');
        $this->context->client->setPrompt('select_account consent');
        
        if ($this->context->client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.


            if ($this->context->client->getRefreshToken()) {
                $this->context->client->fetchAccessTokenWithRefreshToken($this->context->client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $this->context->client->createAuthUrl();

                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';

                $authCode = trim(fgets(STDIN));

                $accessToken = $this->context->client->fetchAccessTokenWithAuthCode($authCode);

                $this->context->client->setAccessToken($accessToken);


            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }

            dd($this->context->client->getAccessToken());
            file_put_contents($tokenPath, json_encode($this->context->client->getAccessToken()));
        }

        dd($this->context);
    }
}