<?php
session_cache_expire(1);
session_start();

echo "Session antes de adicionar itens: ";
print_r($_SESSION);
echo "<hr/>";

// Obtém o array de times da sessão
$gols = ($_SESSION['gols']) ? $_SESSION['gols'] : array();

// Adicionando itens (times) ao array de gols
$gols["saopaulo"] = 0;
$gols["corinthians"] = 0;
$gols["palmeiras"] = 0;
$gols["atleticopr"] = 0;
$gols["flamengo"] = 0;

// Atualiza a sessão com o array de gols
$_SESSION["gols"] = $gols;

echo "Session depois de adicionar itens: ";
print_r($_SESSION);
