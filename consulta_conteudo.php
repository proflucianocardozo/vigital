<?php
require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
?><!DOCTYPE html>

<h1>Consulta de Conteúdo</h1>
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
        <title>Consulta de Conteúdo</title>
    </head>
    <body>
        <div>
            <table class='tabela'>
                <tr class='myTr'>
                    <td>Nome</td>
                    <td>Biografia</td>
                    <td>Contribuições</td>
                    <td>Legado</td>
                    <td>Vida Pessoal</td>
                    <td>Morte</td>
                    
                </tr>
                <tr>
                    <?php
                    // Conexão com o banco de dados
                    $bcon = bcon($conecta);

                    echo "<td>";
                    if (($categ == '1') || ($categ == '2')) {
                        $sql = "select ca.* from conhecimento ca";
                        $query = mysqli_query($bcon, $sql);
                    } elseif ($categ == '4') {
                        $sql = "select c.* from conhecimento c where sts_conhecimento = 'R'";
                        $query = mysqli_query($bcon, $sql);
                    } else {
                        $sql = "select c.* from conhecimento c where c.idusuario = '$idUsu'";
                        $query = mysqli_query($bcon, $sql);
                    }
                    while ($result = mysqli_fetch_object($query)) {
    $nome = $result->nome;
    $texto_biografia = $result->texto_biografia;
    $texto_contribuicoes = $result->texto_contribuicoes;
    $texto_legado = $result->texto_legado;
    $texto_vidapessoal = $result->texto_vidapessoal;
    $texto_morte = $result->texto_morte;
    $url_video = $result->url_video;
    $sts_conhecimento = $result->sts_conhecimento;
    $color = ($c % 2) == 0 ? "<tr bgcolor='#88b8de'>" : "<tr>";
    echo "$color
                        <td class='Mytd'>$nome</td>
                        . <td class='Mytd'>$texto_biografia</td>"
    . "<td class='Mytd'>$texto_contribuicoes</td>"
    . "<td class='Mytd'>$texto_legado</td>
                        <td class='Mytd'>$texto_vidapessoal</td>
                        <td class='Mytd'>$texto_morte</td>";

    if ($sts_conhecimento == 'A') {

                            echo "            
                        <td class='Mytd'><a href='visualiza_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/monitor_go.png' alt='Visualizar'></a></td> 
            </tr>";
                        }

                        //---------- Sobre o Administrador ------------
                        if (($categ == '1') || ($categ == '2')) {

                            if ($sts_conhecimento == 'R') {

                                echo "            
                        <td class='Mytd'>Situação: Revisão</td> 
                        <td class='Mytd'><a href='exclui_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/application_delete.png' alt='Excluir'></a></td> 
                        <td class='Mytd'><a href='aprova_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/accept.png' alt='Aprovar'></a></td> 
                        <td class='Mytd'><a href='pendencia_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/error.png' alt='Pendenciar'></a></td> 
                    </td>
            </tr>";
                            }

                            if ($sts_conhecimento == 'P') {

                                echo "            
                        <td class='Mytd'>Situação: Pendente</td> 
                        <td class='Mytd'><a href='exclui_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/application_delete.png' alt='Excluir'></a></td> 
                        <td class='Mytd'><a href='aprova_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/accept.png' alt='Aprovar'></a></td> 
                        <td class='Mytd'><a href='revisa_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/book_previous.png' alt='Pendenciar'></a></td> 
                    </td>
            </tr>";
                            }

                            $c++;
                        } elseif
                        ($categ == '3') {

                            if ($sts_conhecimento == 'R') {

                                echo "            
                        <td class='Mytd'>Situação: Revisão</td> 
                        <td class='Mytd'><a href='exclui_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/application_delete.png' alt='Excluir'></a></td></tr>";
                            }

                            if ($sts_conhecimento == 'P') {

                                echo "            
                        <td class='Mytd'>Situação: Pendente</td> 
                        <td class='Mytd'><a href='exclui_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/application_delete.png' alt='Excluir'></a></td> 
                        <td class='Mytd'><a href='revisa_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/book_previous.png' alt='Pendenciar'></a></td> 
                    </td>
            </tr>";
                            }

                            $c++;
                        } elseif ($categ == '4') {

                            if ($sts_conhecimento == 'R') {

                                echo "            
                        <td class='Mytd'>Situação: Revisão</td> 
                        <td class='Mytd'><a href='exclui_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/application_delete.png' alt='Excluir'></a></td>
                        <td class='Mytd'><a href='aprova_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/accept.png' alt='Aprovar'></a></td></tr>";
                            }

                            if ($sts_conhecimento == 'P') {

                                echo "            
                        <td class='Mytd'>Situação: Pendente</td> 
                        <td class='Mytd'><a href='exclui_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/application_delete.png' alt='Excluir'></a></td> 
                        <td class='Mytd'><a href='revisa_conteudo.php?id_conhecimento=$result->id_conhecimento'><img src='icones/book_previous.png' alt='Pendenciar'></a></td> 
                    </td>
            </tr>";
                            }

                            $c++;
                        }
                    }
                    ?>
                </tr>
            </table>
        </div>
        <p><a href="<?php url_inicio(); ?>inicio.php"><img src="imagem/sair.png" alt=""/></a></p>
        <div>
            <?php rodape($user) ?>
        </div>
    </body>
</html>
