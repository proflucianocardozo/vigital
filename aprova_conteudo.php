<?php
require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];

?><!DOCTYPE html>

<h1>Consulta de Conteúdo - Aprovação de Conteúdo</h1>


<?php
// Exemplo de código PHP embutido para mostrar a data atual
publicar($categ, $ativo);

$dataAtual = date('d/m/Y');
echo "<p>Hoje é: $dataAtual</p>";

$id_conhecimento = $_GET['id_conhecimento'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aprova Conteúdo</title>
    </head>
    <body>
        <form name='excluir' method='post' action='aprovar_conteudo.php'>
            <div>
                <table class='tabela'>
                    <tr class='myTr'>

                    </tr>
                    <tr>
                        <?php
                        // Conexão com o banco de dados
                        $bcon = bcon($conecta);

                        echo "<td>";

                        $sql = "select * from conhecimento where id_conhecimento = '$id_conhecimento'";
                        $query = mysqli_query($bcon, $sql);

                        while ($result = mysqli_fetch_object($query)) {
                            $id_conhecimento = $result->id_conhecimento;
                            $tema_principal = $result->tema_principal;
                            $tema = $result->tema;
                            $titulo = $result->titulo;
                            $subtitulo = $result->subtitulo;
                            $subtitulo2 = $result->subtitulo2;
                            $subtitulo3 = $result->subtitulo3;
                            $texto = $result->texto;
                            $url_texto = $result->url_texto;
                            $url_video = $result->url_video;
                            $url_imagem = $result->url_imagem;
                            $url_audio = $result->url_audio;
                            $color = ($c % 2) == 0 ? "<tr bgcolor='#88b8de'>" : "<tr>";
                            echo "$color
                        <td class='Mytd'>$tema_principal</td>
                        . <td class='Mytd'>$tema</td>"
                            . "<td class='Mytd'>$titulo</td>"
                            . "<td class='Mytd'>$subtitulo</td>
                        <td class='Mytd'>$subtitulo2</td>
                        <td class='Mytd'>$subtitulo3</td>
                    </td>
                    <input name='id_conhecimento' value='$id_conhecimento' hidden>
            </tr>";
                            $c++;
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <input type='submit' value='Confirma?'>
            <p><a href="<?php url_inicio(); ?>consulta_conteudo.php"><img src="imagem/sair.png" alt=""/></a></p>
            <div>
                <?php rodape($user) ?>
            </div>
        </form>
    </body>
</html>
