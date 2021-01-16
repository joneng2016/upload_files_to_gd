<?php

namespace App\Service\TraitGoogleApiService;

use GuzzleHttp\Client;

use Google_Client;
use Google_Service_Drive;

trait StartConnectionTrait {

	public function startConnection() {

        $this->log->info($this->text->startConnectionGoogleService);

        $credentials = read_position_application() ."\credentials" . '\credentials.json';
        
        $this->context->client = new Google_Client();

        $this->context->client->setHttpClient(new Client(['verify' => false]));
        $this->context->client->setApplicationName('Google Drive API PHP Quickstart');
        $this->context->client->setScopes(Google_Service_Drive::DRIVE);
        $this->context->client->setAuthConfig($credentials);
        $this->context->client->setAccessType('offline');
        $this->context->client->setPrompt('select_account consent');

        if ($this->context->client->isAccessTokenExpired()) {

            $this->log->info($this->text->startNewToken);

            if ($this->context->client->getRefreshToken()) {
                
                $this->context
                    ->client
                    ->fetchAccessTokenWithRefreshToken(
                        $this->context->client->getRefreshToken()
                    );

            } else {

                $authUrl = $this->context->client->createAuthUrl();
                $addressOfFile = write_url_to_access($authUrl);
                
                $this->log->info($this->text->textoAcessoArquivoUrl($addressOfFile));

                fgets(STDIN);

//                $authCode = read_file($this->tokenPath);
//                $accessToken = $this->context->client->fetchAccessTokenWithAuthCode($authCode);
                
//                $this->context->client->setAccessToken($accessToken);
            }
 
            if (!file_exists(dirname($this->tokenPath)))
                mkdir(dirname($this->tokenPath), 0700, true);
 
            file_put_contents($this->tokenPath, json_encode($this->context->client->getAccessToken()));
        }
        
    }

}