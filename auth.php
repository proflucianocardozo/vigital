<?php

include ('funcao.php');

session_cache_expire(1);
session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];
$pass = md5($pass);

$bcon = bcon($conecta);


$sql = "select * from usuario where usuario_login = '$user' and usuario_senha = '$pass'";


$query = mysqli_query($bcon, $sql) or die('Não foi possível a cnexão com o Banco de Dados!');
$result = mysqli_fetch_object($query);


if (($result->usuario_login == $user)&& ($result->usuario_senha == $pass)) {
    $login = $result->usuario_login;
    $idUsu = $result->idusuario;
    $usuario_ativo = $result->usuario_ativo;
    $ativo = $result->usuario_ativo;
//    $categoria_id = $result->categoria_id;
    $categ = $result->categoria_id;
//    $id_grupo = $result->id_grupo;
    if ($usuario_ativo == 0) {
        echo "<script>"
        . "alert('Usuário Inativado!');"
        . "history.go(-1);"
        . "</script> ";
        exit;
    }
    $chave = "lcmrjita";
    $ip = $_SERVER["REMOTE_ADR"];
    $hora = time();
    $chave = md5($login . $chave . $ip . $hora);
    $_SESSION['MeuLogin'] = array("login" => $login,"chave" => $chave,"hora" => $hora,"idUsu" => $idUsu);
    $_SESSION['Identifi'] = array("usuario_ativo"=>$ativo,"categoria_id"=>$categ,"idUsu"=>$usuario_id);

    header("location: inicio.php");
} else {
    header("location: index.php?m=1");
}
