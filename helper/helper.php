<?php

function dd($input) {
    var_dump($input);
    die();
}

function read_position_application() {
    return $whereReadEnv = __DIR__ . "\..";
}

function read_env() {
    $information = "";
    $whereReadEnv = __DIR__ . "\..\.env";
    
    if (!file_exists($whereReadEnv))
        return false;
        
    $file = fopen($whereReadEnv,"r");
    $information = fread($file,filesize($whereReadEnv));
    fclose($file);

    $lines = explode("\n",$information);

    foreach($lines as $line) {
        $info = explode("=",$line);
        
        $_ENV[$info[0]] = $info[1];
    }

    return true;
}

function env($var) {
    return $_ENV[$var];
}

function read_file($where) {
    $information = "";
    
    if (!file_exists($where))
        return false;
        
    $file = fopen($where,"r");
    $information = fread($file,filesize($where));
    fclose($file);

    return $information;
}

function authTwoDotZero($context) {
    $client_secret = $context->client_secret;
    $url = $context->auth_uri;
    $client_id = $context->client_id;
    $token_uri = $context->token_uri;
    $redirect_uri = $context->redirect_uris;

	$params = array(
		"code" => 4,
		"client_id" => $client_id,
		"client_secret" => $client_secret,
		"redirect_uri" => $redirect_uri,
		"grant_type" => "authorization_code"
	);

	// Init curl
	$ch = curl_init();

	// Set curl options
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	// Execute curl
	$r = curl_exec($ch);

	// Close connection
    curl_close($ch);
    
    return $r;
} 

function write_url_to_access($url) {    
    
    $whereApplicaton = read_position_application() . "\storage\url_file.gs";

    $file = fopen($whereApplicaton,"w");
    fwrite($file,$url);
    fclose($file);
    
    return $whereApplicaton;
}