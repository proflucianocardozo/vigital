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
?>
<form name="conhecimento" action="grava_conhecimento.php" method="post" enctype="multipart/form-data">
    <h1>Formulário de Entrada de Dados</h1>
    <table class="myTable">
        <tr>
            <td>
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" size="86" maxlength="50" required><br><br>

                <label for="texto_biografia">Biografia:</label><br>
                <textarea id="texto_biografia" name="texto_biografia" rows="10" cols="80" required></textarea><br><br>

                <label for="texto_contribuicoes">Contribuições:</label><br>
                <textarea id="texto_contribuicoes" name="texto_contribuicoes" rows="10" cols="80" required></textarea><br><br>

                <label for="texto_legado">Legado:</label><br><br>
                <textarea id="texto_legado" name="texto_legado" rows="10" cols="80" required></textarea><br><br>

                <label for="texto_vidapessoal">Vida Pessoal:</label><br>
                <textarea id="texto_vidapessoal" name="texto_vidapessoal" rows="10" cols="80" required></textarea><br><br>

                <label for="texto_morte">Morte:</label><br>
                <textarea id="texto_morte" name="texto_morte" rows="10" cols="80" required></textarea><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <label for="video">Escolha um vídeo:</label>
                <input type="file" name="video" id="video" accept="video/*">
                <!--<input type="submit" value="Upload">-->
                <input type="submit" value="Enviar">
                <p><a href = "inicio.php">Voltar ao Início</a></p>   
            </td>
        </tr>
    </table>
</form>


<div>
    <?php rodape($user) ?>
</div>

</body>
</html>
