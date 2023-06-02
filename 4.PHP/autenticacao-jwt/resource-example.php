<?php

/**
 * Este script representa um recurso da aplicação.
 * Tal como, usuário (cadastrar, obter, editar, excluir...)
 * 
 * A ideia é permitir que o cliente acesse o conteúdo do recurso 
 * somente se passar pela validação do token.
 */


 
/**
 * Incluir o código que faz a validação do Token. 
 * Caso o Token não foi passado pelo cliente, ou
 * seja inválido, a execução deste script é interrompida
 * neste ponto.
 */
require_once "validate-jwt.inc.php";


// Continua a execução do script PHP...
// Lógica principal do código...
print_r('{ "message": "Este recurso abriu normalmente"}');

// ...
?>
