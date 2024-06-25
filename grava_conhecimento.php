<?php
require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
//

// Verifica a conexão
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// Recupera os dados do formulário
    $nome = ($_POST['nome']);
    $texto_biografia = ($_POST['texto_biografia']);
    $texto_contribuicoes = ($_POST['texto_contribuicoes']);
    $texto_legado = ($_POST['texto_legado']);
    $texto_vidapessoal = ($_POST['texto_vidapessoal']);
    $texto_morte = ($_POST['texto_morte']);
    $url_video = $_POST['url_video'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["video"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifique se o arquivo é um vídeo
    $check = mime_content_type($_FILES["video"]["tmp_name"]);
    if (strpos($check, "video/") === 0) {
        echo "O arquivo é um vídeo - " . $check . ".<br>";
        $uploadOk = 1;
    } else {
        echo "O arquivo não é um vídeo.<br>";
        $uploadOk = 0;
    }

// Verifique se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.<br>";
        $uploadOk = 0;
    }

// Verifique o tamanho do arquivo (limite de 100MB neste exemplo)
    if ($_FILES["video"]["size"] > 100000000) {
        echo "Desculpe, o seu arquivo é muito grande.<br>";
        $uploadOk = 0;
    }

// Permita certos formatos de arquivo de vídeo
    $allowedFormats = array("mp4", "avi", "mov", "wmv", "flv");
    if (!in_array($videoFileType, $allowedFormats)) {
        echo "Desculpe, apenas arquivos MP4, AVI, MOV, WMV & FLV são permitidos.<br>";
        $uploadOk = 0;
    }

// Verifique se $uploadOk está definido como 0 por algum erro
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.<br>";
    } else {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
            echo "O arquivo " . htmlspecialchars(basename($_FILES["video"]["name"])) . " foi enviado com sucesso.<br>";
        } else {
            echo "Desculpe, houve um erro ao enviar seu arquivo.<br>";
        }
    }
} else {
    echo "Método de requisição inválido.<br>";
}

$url_video = "https://vigital.proflucianocardozo.com.br/" . $target_file;

$bcon = bcon($conecta);
if (!$bcon) {
    echo "<p><b>Não foi possível conectar-se ao banco de dados</b></p>";
    echo mysqli_error($bcon);
} else {
// Recupera os dados do formulário
// Prepara a instrução SQL para inserção
    $sql = "insert into conhecimento(nome,texto_biografia,texto_contribuicoes,texto_legado,texto_vidapessoal,texto_morte,url_video,idusuario,sts_conhecimento) values ('$nome','$texto_biografia','$texto_contribuicoes','$texto_legado','$texto_vidapessoal','$texto_morte','$url_video','$idUsu','R')";

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