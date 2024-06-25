<?php
require('../require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
?><!DOCTYPE html>

<h1>Formulário de Consulta de Usuário</h1>
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
        <title>Consulta de Usuário</title>
    </head>
    <body>
        <form action='exclui_conhecimento' method='get'>
            <div>
                <table class='tabela'>
                    <tr class='myTr'>
                        <td class="myDiv">Id do Usuário</td>
                        <td class="myDiv">Nome</td>
                        <td class="myDiv">Login</td>                    
                        <td class="myDiv">e-mail</td>
                    </tr>
                    <tr>
                        <?php
                        // Conexão com o banco de dados
                        $bcon = bcon($conecta);

                        echo "<td>";

                        $sql = "select * from usuario order by usuario_nome";
                        $query = mysqli_query($bcon, $sql);

                        while ($result = mysqli_fetch_object($query)) {
                            $idusuario = $result->idusuario;
                            $usuario_nome = $result->usuario_nome;
                            $usuario_login = $result->usuario_login;
                            $usuario_email = $result->usuario_email;
                            $color = ($c % 2) == 0 ? "<tr bgcolor='#88b8de'>" : "<tr>";
                            echo "$color
                        <td class='Mytd'>$idusuario</td>
                        . <td class='Mytd'>$usuario_nome</td>"
                            . "<td class='Mytd'>$usuario_login</td>"
                            . "<td class='Mytd'>$usuario_email</td>
                    </td>
            </tr>";
                            $c++;
                        }
                        ?>
                    </tr>
                </table>
            </div>
            <p><a href="<?php url_inicio(); ?>usuario.php"><img src="../imagem/sair.png" alt=""/></a></p>
            <div>
                <?php rodape($user) ?>
            </div>
        </form>
    </body>
</html>
