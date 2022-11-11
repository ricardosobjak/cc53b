<?php
require_once('../conexao.php');
require_once('model/pessoa.dao.php');

// Instanciar um objeto DAO de pessoa
$pessoaDAO = new PessoaDAO($pdo);


// Recebe a ação desejada do cliente
$action = @$_REQUEST['action'];
$view = 'view/list.php'; // View default

// Decidir qual ação será tomada
if($action == 'novo') {
    $view = 'view/form.php';
} else if($action == 'editar') {
    $view = 'view/form.php';
/*
    if(@$_REQUEST['id']) {
        

        $sql = "SELECT * FROM tb_pessoa 
            WHERE id = " . $_REQUEST['id'];
        
        $result = $_conn->query($sql);

        $pessoa;
        if(mysqli_num_rows($result) > 0)
            $pessoa = mysqli_fetch_array($result);
    }  */

} else if($action == 'deletar') {

} else if($action == 'salvar') {
    
    if(!$pessoaDAO->insert($_POST)) {
        $view = 'view/form.php';

        echo "Erro ao salvar pessoa";
    }

} 

if($view == 'view/list.php') {
    // Buscar as pessoas no Banco de Dados
    $pessoas = $pessoaDAO->getAll();

    //print_r($pessoas);
}

require_once($view); // Abrindo uma view