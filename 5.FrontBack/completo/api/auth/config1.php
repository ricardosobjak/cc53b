<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'db_api_projeto1');

$conn = new mysqli(HOST, USER, PASS, BASE);

define("JWT_SECRET_KEY", "asfcniasucfIOCSYNIAUfosacfo");

?>