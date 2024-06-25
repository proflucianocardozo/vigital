<?php

session_start();
if (isset($_SESSION['MeuLogin'])) {

    $login = $_SESSION['MeuLogin']['login'];
    $hora = $_SESSION['MeuLogin']['hora'];
    $idUsu = $_SESSION['MeuLogin']['idUsu'];
//    $categoria_id = $_SESSION['MeuLogin']['categoria_id'];
    $usuario_ativo = $_SESSION['MeuLogin']['usuario_ativo'];
    $chave = "lcmrjita";
    $ip = $_SERVER['REMOTE_ADR'];

    if ($_SESSION['MeuLogin']['chave'] != md5($login . $chave . $ip . $hora)) {
        header("location: index.php?m=2");
    }
    if (( time() - $hora ) > 9000) {
        session_destroy();
        header("location: index.php?m=3");
    } else {
        $hora = time();
        $chave = md5($login . $chave . $ip . $hora);
        $_SESSION['MeuLogin'] = array("login" => $login, "chave" => $chave, "hora" => $hora, "idUsu" => $idUsu);

        $tab_esquerda;
    }
} else {
    header("location: index.php?m=2");
}
function url_inicio(){
    $url_inicio = "https://$_SERVER[HTTP_HOST]";
}
function url_imagem(){
    $URL_ATUAL= "https://$_SERVER[HTTP_HOST]".'/imagem/';
//    echo "<pre>";
//    echo print_r($_SERVER);
//    echo "</pre>";
echo $URL_ATUAL;

}
