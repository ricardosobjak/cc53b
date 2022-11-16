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
    if(@$_REQUEST['id']) {
        $view = 'view/form.php';
        $pessoa = $pessoaDAO->getById($_REQUEST['id']);
    } else {
        $message = "A pessoa não está cadastrada";
    }

} else if($action == 'deletar') {
    $id = @$_REQUEST['id'];

    if($id) {
        if($pessoaDAO->delete($id) > 0)
            $message = "Pessoa deletada com sucesso.";
        else
            $message = "Nenhuma pessoa foi deletada.";
    } else 
        $message = "Informe o código da pessoa para deletar.";
    

} else if($action == 'salvar') {
    try {
        $res;
        if( !@$_REQUEST['id']) // Insert
            $res = $pessoaDAO->insert($_POST);
        else // Update
            $res = $pessoaDAO->update($_POST);
            
        if(!$res) {
            $view = 'view/form.php';
            
            $message = "Erro ao salvar pessoa";
        } else
            $message = "Salvo com sucesso";

    } catch (\Throwable $th) {
        //throw $th;
        $view = 'view/form.php';
        $message = "Falha ao salvar pessoa. Detalhes do erro: " . $th->getMessage(); 
    }

    
} 

if($view == 'view/list.php') {
    // Buscar as pessoas no Banco de Dados
    $pessoas = $pessoaDAO->getAll();

    //print_r($pessoas);
}

require_once($view); // Abrindo uma view