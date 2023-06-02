<?php

/**
 * Este script PHP é um recurso de autenticação. Serve para gerar o token do usuário.
 * 
 * O objetivo é receber um JSON, no corpo da requisição HTTP, contendo o login e a senha
 * do usuário.
 * 
 * Na sequência, o login e a senha repassados devem ser avaliados (aqui é feito de maneira fictícia).
 * Se estiverem corretos, então o token é gerado e entregue ao cliente. Caso contrário, 
 * uma mensagem informativa é enviada.
 */

// Inclusão de arquivos
require_once "config.inc.php";
require_once "util/jwtutil.class.php";


// Obter o conteúdo do corpo da requisição
$json = file_get_contents('php://input');

// Transforma o JSON em um Objeto PHP
$credentials = json_decode($json);

$responseBody = ''; // Variável para armazenar a resposta para o cliente

/**
 * Se o usuário for válido, então gera o token.
 * 
 * Validação fictícia: o usuário deve ser igual a "admin" e a senha igual a "1234".
 */ 
if($credentials->username == 'admin' && $credentials->password == '1234') {
    // Array de dados para ser carregado no token (aceita qualquer atributo e valor).
    $payload = [
        "sub" => "1", // ID do usuário
        "name" => "Administrador", // Nome do usuário
        "role" => "admin" // Papel do usuário
    ];
    
    // Gerar o token (codificar), usando a classe disponível no arquivo "jwtutil.class.php"
    $token = JwtUtil::encode($payload, JWT_SECRET_KEY);

    // Gerando a mensagem de resposta para o cliente: um JSON contendo o token.
    $responseBody = "{ \"token\": \"$token\" }";
}
/*
 * Caso o usuário e senha sejam inválidos, então uma mensagem 
 * de não autorizado será gerada.
 */
else { 
    // Muda o código de resposta HTTP para 'Unauthorized'
    http_response_code(401);
    // Mensagem JSON informando que a credencial é inválida
    $responseBody = '{ "message": "Credencial inválida" }';
}-

// Defique que o conteúdo da resposta será um JSON (application/JSON)
header('Content-Type: application/json');

// Exibe a resposta
print_r($responseBody);