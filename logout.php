<?php

require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
//echo $user,$idUsu,$categ,$ativo;

session_destroy();

echo "<script>"
 . "history.go(-1);"
 . "</script> ";

rodape($user);
