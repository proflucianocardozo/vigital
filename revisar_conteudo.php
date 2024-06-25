<?php
require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
?>

<h1>Consulta de Conteúdo - Revisão de Conteúdo</h1>


<?php
// Exemplo de código PHP embutido para mostrar a data atual
$dataAtual = date('d/m/Y');
echo "<p>Hoje é: $dataAtual</p>";

$id_conhecimento = $_POST['id_conhecimento'];
$tema_principal = $_POST['tema_principal'];
$tema = $_POST['tema'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$subtitulo2 = $_POST['subtitulo2'];
$subtitulo3 = $_POST['subtitulo3'];
$texto = $_POST['texto'];
$url_texto = $_POST['url_texto'];
$url_video = $_POST['url_video'];
$url_imagem = $_POST['url_imagem'];
$url_audio = $_POST['url_audio'];

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aprovação de Conteúdo</title>
    </head>
    <body>
        <form name='excluir' method='post' action='pendenciar_conteudo.php'>
            <div>
                <table class='tabela'>
                    <tr class='myTr'>

                    </tr>
                    <tr>
                        <?php
                        // Conexão com o banco de dados
                        $bcon = bcon($conecta);

                        echo "<td>";

                        $sql = "update conhecimento set tema_principal = '$tema_principal', tema = '$tema',"
                                . "titulo = '$titulo', subtitulo = '$subtitulo', subtitulo2 = '$subtitulo2',"
                                . "subtitulo3 = '$subtitulo3', texto = '$texto', url_texto = '$url_texto',"
                                . "url_video = '$url_video', url_imagem = '$url_imagem', url_audio = '$url_audio',"
                                . "sts_conhecimento = 'R' where id_conhecimento = '$id_conhecimento'";
                        $query = mysqli_query($bcon, $sql);

                        if (mysqli_query($bcon, $sql) === TRUE) {
                            echo "<script>"
                            . "alert('Registro Em Revisado com Sucesso!');"
                            . "history.go(-1);"
                            . "</script> ";
                            exit;
                        } else {
                            echo "Erro na inserção: " . $bcon->error;
                        }
                        mysqli_close($bcon);
                        ?>
                    </tr>
                </table>
            </div>
            <p><a href="consulta_conteudo.php"><img src="imagem/sair.png" alt=""/></a></p>
            <div>
                <?php rodape($user) ?>
            </div>
        </form>
    </body>
</html>
