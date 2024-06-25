<?php

function cabecalho() {

    echo ' <html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <!-- CSS only -->

        <title>S.M.S.</title>
    </head>
    <body>
        <header>
            <div>
<h3></h3>
</td>
<td>
<!-- <img src = "imagem/logo_transp_sem_escrita.png" class = "myDiv3"/>-->
</td>
</div>
</header>
<div class = "conteudo">
';
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function rodape($user) {
    echo"            <footer id='footer'>
        <p>Gestão de Conhecimento</p>
        <p>Copyright &copy; 2024 - by Professor Luciano Cardozo Magalhães<br/>
            <a href=''>Facebook</a> | <a href=''>Twitter</a></p>";
    echo "Usuário: " . $user;
    echo"</footer>
</body>
</html>";
}

function bcon($conecta) {

//    $link = mysql_select_db($banco, mysql_connect('localhost', 'root', 'lcmrjit@'));
    $conn = mysqli_connect('br1016.hostgator.com.br', 'lucama33_sms', '9vS8JQ3snDSr2Le', 'lucama33_sms');

//    if (!$link) {
//        echo "Erro: NÃ£o Foi feita a conexÃ£o com o banco de dados. Tente novamente.";
//    }
//    return $link;
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $conecta = $conn;

    return $conecta;
}

// Funções para Usuário Nível 4

function publicar($categ, $ativo) {
    if (($categ == '4') || ($ativo == 0)) {

        echo "<script>"
        . "alert('Você não tem Permissão para Publicar Conteúdo ou Usuário Inativado!');"
        . "history.go(-1);"
        . "</script> ";
        exit;
    }
}

function exc_conteudo($categ, $ativo) {
    if (($categ == '4') || ($ativo == 0)) {

        echo "<script>"
        . "alert('Você não tem Permissão para Excluir Conteúdo ou Usuário Inativado!');"
        . "history.go(-1);"
        . "</script> ";
        exit;
    }
}

function usuariocat($categ, $ativo) {
    if (($categ == '4') || ($ativo == 0)) {

        echo "<script>"
        . "alert('Você não tem Permissão para Incluir/Excluir Usuários, ou Usuário Inativado!');"
        . "history.go(-1);"
        . "</script> ";
        exit;
    }
}

function usuarioativo($usuario_ativo) {
    if ($usuario_ativo == 0) {

        echo "<script>"
        . "alert('Usuário Inativado!');"
        . "history.go(-1);"
        . "</script> ";
        exit;
    }
}
