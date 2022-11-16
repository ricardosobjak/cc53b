<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_user";

// Connect to the MySQL database using the PDO object.
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
