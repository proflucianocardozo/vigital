<?php
require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];

exc_conteudo($categ, $ativo);

?><!DOCTYPE html>

<h1>Consulta de Conteúdo - Exclusão de Conteúdo</h1>


<?php
// Exemplo de código PHP embutido para mostrar a data atual
$dataAtual = date('d/m/Y');
echo "<p>Hoje é: $dataAtual</p>";

$id_conhecimento = $_POST['id_conhecimento'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exlusão de Conteúdo</title>
    </head>
    <body>
        <form name='excluir' method='post' action='excluir_conteudo.php'>
            <div>
                <table class='tabela'>
                    <tr class='myTr'>

                    </tr>
                    <tr>
                        <?php
                        // Conexão com o banco de dados
                        $bcon = bcon($conecta);

                        echo "<td>";

                        $sql = "delete from conhecimento where id_conhecimento = '$id_conhecimento'";
                        $query = mysqli_query($bcon, $sql);

                        if (mysqli_query($bcon, $sql) === TRUE) {
                            echo "<script>"
                            . "alert('Registro Excluído com Sucesso!');"
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
            <p><a href="<?php url_inicio(); ?>consulta_conteudo.php"><img src="imagem/sair.png" alt=""/></a></p>
            <div>
                <?php rodape($user) ?>
            </div>
        </form>
    </body>
</html>
