<?php
require('../require.php');
include('funcao.php');

cabecalho_usuario();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Entrada de Dados</title>
</head>
<body>
    <h1>Formulário de Entrada de Dados</h1>
    <form method="post" action="processar_dados.php">
        <label for="id_usuario">ID do Usuário:</label>
        <input type="text" name="id_usuario"><br>

        <label for="usuario_nome">Nome do Usuário:</label>
        <input type="text" name="usuario_nome"><br>

        <label for="usuario_login">Login do Usuário:</label>
        <input type="text" name="usuario_login"><br>

        <label for="usuario_senha">Senha do Usuário:</label>
        <input type="password" name="usuario_senha"><br>

        <label for="usuario_ativo">Ativo:</label>
        <input type="checkbox" name="usuario_ativo" value="1"><br>

        <label for="id_categoria">ID da Categoria:</label>
        <input type="text" name="id_categoria"><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
