<?php
require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];

publicar($categ, $ativo);
// Exemplo de código PHP embutido para mostrar a data atual
$dataAtual = date('d/m/Y');
echo "<p>Hoje é: $dataAtual</p>";

$id_conhecimento = $_GET['id_conhecimento'];
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Formulário de Edição de Dados</title>
    </head>
    <body>
        <h2>Formulário de Edição de Dados</h2>
        <form name='conhecimento' action='revisar_conteudo.php' method='post'>
            <article>
                <div class='myDiv'>
                    <?php
                    // Conexão com o banco de dados
                    $bcon = bcon($conecta);

                    $sql = "select * from conhecimento where id_conhecimento = '$id_conhecimento'";
                    $query = mysqli_query($bcon, $sql);
                    $result = mysqli_fetch_object($query);

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

                    echo "
                        <legend>
                        Títulos Básicos
                        </legend>
                        <fieldset>
                        <label for = 'tema_principal'>Disciplina:</label>
                        <input type = 'text' size = '125' name = 'tema_principal' value = '$tema_principal' required><br><br>

                        <label for = 'tema'>Tema:</label>
                        <input type = 'text' size = '125' name = 'tema' value = '$tema' required'><br><br>

                        <label for = 'titulo'>Título:</label>
                        <input type = 'text' size = '125' name = 'titulo' value='$titulo' required><br><br>

                        <label for = 'subtitulo'>Subtítulo:</label>
                        <input type = 'text' size = '125' name = 'subtitulo' value='$subtitulo'><br><br><!--comment-->

                        <label for = 'subtitulo2'>Subtítulo 2:</label>
                        <input type = 'text' size = '125' name = 'subtitulo2' value='$subtitulo2'><br><br><!--comment-->

                        <label for = 'subtitulo3'>Subtítulo 3:</label>
                        <input type = 'text' size = '125' name = 'subtitulo3' value='$subtitulo3'><br>
                        <input type = 'text' name='id_conhecimento' value='$id_conhecimento' hidden />
                        </fieldset>
                    </div>
                    <div class = 'myDiv'>
                    <fieldset>
                    <legend>Conteúdo</legend>
                    <label for = 'texto'>Texto:</label>
                    <textarea name = 'texto' rows = '20' cols = '115'>$texto</textarea><br><br>

                    <label for = 'url_texto'>URL Texto:</label>
                    <input type = 'text' size = '125' name = 'url_texto' value='$url_texto'><br><br>

                    <label for = 'url_video'>URL Vídeo:</label>
                    <input type = 'text' size = '125' name = 'url_video' value='$url_video'><br><br>

                    <label for = 'url_imagem'>URL Imagem:</label>
                    <input type = 'text' size = '125' name = 'url_imagem' value='$url_imagem'><br><br>

                    <label for = 'url_audio'>URL Áudio:</label>
                    <input type = 'text' size = '125' name = 'url_audio' value='$url_audio'><br>
                    </fieldset>
                    </div>
                    <input type = 'submit' value = 'Enviar'>
                    <p><a href = 'inicio.php'>Voltar ao Início</a></p>";
                    ?>
                </div>
            </article>
        </form>
        <p><a href='consulta_conteudo.php'><img src='imagem/sair.png' alt=''/></a></p>
        <div>
            <?php rodape($user) ?>
        </div>
    </form>
</body>
</html>
