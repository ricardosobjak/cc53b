<?php
  include 'config.php';

  require 'entidades/anuncio/db.php';
  require 'entidades/categoria/db.php';
  require 'entidades/marca/db.php';

  $anuncioDAO = new AnuncioDAO($_conn);

  $view = 'entidades/anuncio/view/list_public.php';

  $categoria = @$_REQUEST['categoria'];

  $result = $anuncioDAO->getAll($categoria);

  include 'template/index.php';
