<?php
require('../require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
?><!DOCTYPE html>

<h1>Formulário de Cadastro de Usuário</h1>
<?php
// Exemplo de código PHP embutido para mostrar a data atual
$dataAtual = date('d/m/Y');
echo "<p>Hoje é: $dataAtual</p>";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Entrada de Dados</title>
    </head>
    <body>
        <h2>Formulário de Entrada de Dados</h2>
        <form name="usuario" action="grava_usuario.php" method="post">
            <article>
                <div class="myDiv">
                    <fieldset>
                        <legend>
                            Dados do Usuário
                        </legend>
                        <label for="tema_principal">Nome:</label>
                        <input type="text" size="60" name="usuario_nome" required ><br><br>

                        <label for="tema">Login:</label>
                        <input type="text" size="60" name="usuario_login" required placeholder="não poderá ser alterado"><br><br>

                        <label for="titulo">Senha:</label>
                        <input type="password" size="60" name="usuario_senha" required><br><br>

                        <label for="subtitulo">e-mail:</label>
                        <input type="text" size="125" name="usuario_email"><br><br><!-- comment -->

                        <label for="subtitulo">Categoria:</label>
                        <?php
                        $bcon = bcon($conecta);

                        if (!$bcon) {
                            echo "<p><b>Não foi possível conectar-se ao banco de dados</b></p>";
                            echo mysqli_error();
                        } else {
                            $sql = "select * from categoria order by categoria_id";
                            $query = mysqli_query($bcon, $sql);
                            echo "<select name='categoria_id'>"
                            . "<option value = '99'> --Selecione</option>";
                            while ($result = mysqli_fetch_object($query)) {
                                $categoria_id = $result->categoria_id;
                                $nome_categoria = $result->nome_categoria;
                                echo "<option value=" . $categoria_id . ">";
                                echo $nome_categoria;
                                "</option>";
                            }
                        }
                        echo "</select><br>";
                        ?>
                        <br>
                        <input type="submit" value="Enviar">

                        <p><a href = "usuario.php">Voltar ao Início</a></p>
                    </fieldset>
                </div>
                <div>
                    <?php rodape($user) ?>
                </div>
            </article>
        </form>
    </body>
</html>
