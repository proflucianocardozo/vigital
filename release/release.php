<?php
require('../require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];

usuariocat($categ, $ativo);
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relesea do Sistema</title>
    </head>
    <body>
        <section>
            <div>
                <nav>
                    <ul>
                        <li class="myLi">
                            <div>
                                <a href="<?php url_inicio(); ?>../inicio.php"><img src="/imagem/sair.png" alt=""/></a>

                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div>
                <iframe src="https://docs.google.com/document/d/162e9uNWH8ufhw8B_AyQCjZBPLUu5F9bHo3GwVHDEwHU/" width="850" height="700"></iframe>
            </div>
    </body>
</html>
<a href="2024/mar/13 de mar - release.pdf"></a>
</section>
<?php rodape($user); ?>
</div>