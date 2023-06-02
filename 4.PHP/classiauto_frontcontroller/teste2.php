<?php 
  session_start();


  $id = $_REQUEST["id"];
  $qtd = $_REQUEST['qtd'];
  
  $cart = &$_SESSION['cart'];

  if(array_key_exists($id, $cart))
    $cart[$id] += $qtd;
  else 
    $cart[$id] = $qtd;


  print_r($_SESSION['cart']);
?>