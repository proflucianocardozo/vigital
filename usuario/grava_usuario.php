<?php
require('../require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
//
$usuario_nome = $_POST['usuario_nome'];
$usuario_login = $_POST['usuario_login'];
$usuario_senha = md5($_POST['usuario_senha']);
$usuario_email = $_POST['usuario_email'];
echo $categoria_id = $_POST['categoria_id'];

// Verifica a conexão

$bcon = bcon($conecta);
if (!$bcon) {
    echo "<p><b>Não foi possível conectar-se ao banco de dados</b></p>";
    echo mysqli_error($bcon);
} else {
// Recupera os dados do formulário
// Prepara a instrução SQL para inserção
    $sql = "insert into usuario(usuario_nome,usuario_login,usuario_senha,usuario_email,usuario_ativo,categoria_id) values ('$usuario_nome','$usuario_login','$usuario_senha','$usuario_email','$ativo','$categoria_id')";

    if (mysqli_query($bcon, $sql) === TRUE) {
        echo "<script>"
        . "alert('Registro Incluído com Sucesso!');"
        . "history.go(-1);"
        . "</script> ";
        exit;
    } else {
        echo "Erro na inserção: " . $bcon->error;
    }
    mysqli_close($bcon);
}
?>
<p><a href = "formulario_aluno.php">Voltar ao formulário</a></p>