<?php 
  session_start();

  $_SESSION['cart']['8800'] = 1;

  print_r($_SESSION['cart']);
?>