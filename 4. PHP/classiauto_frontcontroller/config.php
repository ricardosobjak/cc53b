<?php
  #error_reporting(E_ERROR | E_PARSE);
  session_start();

  function sessionValid() {
    return isset($_SESSION['classiauto_user_id']);
  }

  // Variáveis de ambiente
  $CONFIG['webroot'] = '/classiauto_frontcontroller/'; // Caminho da aplicação dentro do servidor web

  /** 
   * Método para indicar o caminho absoluto da aplicação 
   * (diretório raiz da aplicação) no contexto da web.
   */
  function webroot() {
    global $CONFIG;
    return $CONFIG['webroot'];
  }

  /** 
   * Método para indicar o caminho absoluto da aplicação 
   * (diretório raiz da aplicação) no contexto do sistema de arquivos.
   */
  function approot() {
    global $CONFIG;
    return $_SERVER['DOCUMENT_ROOT'] . '/' . $CONFIG['webroot'];
  }

  // Abre a conaxão com o bando de dados
  require approot() . 'conexao.php';

