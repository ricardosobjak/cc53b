<?php 
  session_start();

  $cart = array(
    "1025" => 1,
    "2689" => 4
  );

  $_SESSION["cart"] = $cart;


  print_r($_SESSION['cart']);


?>