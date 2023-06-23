<?php

require_once("lib/jwtutil.inc.php");
require_once("config1.php");

$json = file_get_contents("php://input");
$credentials = json_decode($json);
$responseBody = '';

// Conexão com o banco de dados
$conn = new mysqli(HOST, USER, PASS, BASE);

// Verificar se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta ao banco de dados para verificar as credenciais

$query = "SELECT * FROM tb_usuario WHERE email = ? AND senha = ?"; // Consulta para buscar um usuário com email e senhas fornecidos
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $credentials->email, $credentials->senha); 
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user) {
    print_r($user); // Exibir informações do usuário para fins de depuração

    $payload = [
        "id" => $user['id'],
        "email" => $user['email'],
        "admin" => $user['adm']
    ];
    
    $token = JwtUtil::encode($payload, JWT_SECRET_KEY);
    $responseBody = '{ "token": "' . $token . '"}';

} else {
    http_response_code(401); // Unauthorized
    $responseBody = '{ "message": "Credencial inválida" }';
}

print_r($responseBody);

$stmt->close();
$conn->close();
?>