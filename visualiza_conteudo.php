<?php
require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
// Exemplo de código PHP embutido para mostrar a data atual
publicar($categ, $ativo);

//$dataAtual = date('d/m/Y');
//echo "<p>Hoje é: $dataAtual</p>";

$id_conhecimento = $_GET['id_conhecimento'];
?>
<div>
    <table style="width:50%;padding-left: 100px;">
        <tr>
            <?php
            // Conexão com o banco de dados
            $bcon = bcon($conecta);

            $sql = "select * from conhecimento where id_conhecimento = '$id_conhecimento'";
            $query = mysqli_query($bcon, $sql);

            $result = mysqli_fetch_object($query);
            $nome = $result->nome;
            $texto_biografia = $result->texto_biografia;
            $texto_contribuicoes = $result->texto_contribuicoes;
            $texto_legado = $result->texto_legado;
            $texto_vidapessoal = $result->texto_vidapessoal;
            $texto_morte = $result->texto_morte;
            $url_video = $result->url_video;
            $sts_conhecimento = $result->sts_conhecimento;
            echo"<tr bgcolor='#88b8de'>";
            echo "$color
                        <td class='Mytd'>$nome</td><tr>
                            <tr bgcolor='#88b8de'><td class='Mytdtitulo'>BIOGRAFIA</td></tr><tr>
                        . <td class='Mytdtxt'>$texto_biografia</td></tr>"
                    . "<tr bgcolor='#88b8de'><td class='Mytdtitulo'>CONTRIBUIÇÕES</td></tr><tr>"
            . "<td class='Mytdtxt'>$texto_contribuicoes</td></tr><tr>"
                    . "<tr bgcolor='#88b8de'><td class='Mytdtitulo'>LEGADO</td></tr><tr>"
            . "<td class='Mytdtxt'>$texto_legado</td></tr><tr>
                <tr bgcolor='#88b8de'><td class='Mytdtitulo'>VIDA PESSOAL</td></tr><tr>
                        <td class='Mytdtxt'>$texto_vidapessoal</td></tr><tr>
                            <tr bgcolor='#88b8de'><td class='Mytdtitulo'>MORTE</td></tr><tr>
                        <td class='Mytdtxt'>$texto_morte</td></tr>
                        <tr>
                        . <td><video width='780' height='620' controls>
                        <source src='$url_video' type='video/mp4'>"
            . "</video></td></tr>";
            ?>
        </tr>
    </table>
</div>
<p><a href="<?php url_inicio(); ?>consulta_conteudo.php"><img src="imagem/sair.png" alt=""/></a></p>
<div>
    <?php rodape($user) ?>
</div>
</body>
</html>
