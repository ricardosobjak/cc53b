<?php

require_once "jwtutil.class.php";

$secret = "secret-muito-secret";
 
$payload = [
    "sub" => "1234567890",
    "name" => "Rodrigo",
    "role" => "admin"
];

$token = JwtUtil::encode($payload, $secret);

$decoded = JwtUtil::decode($token, $secret);

print_r("<b>Token: </b><br/>");
print_r($token);
print_r("<hr/>");
print_r("<b>Payload: </b><br/>");
print_r($decoded);