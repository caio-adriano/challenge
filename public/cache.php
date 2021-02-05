<?php

session_start();
date_default_timezone_set('America/Sao_Paulo');

include_once '../src/Request.php';


$url = 'http://localhost/public/test.json';

$response = SimpleJsonRequest::get($url);

echo '<pre>';
print_r($response);
echo '</pre>';