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
<section>
    <div>
        <nav>
            <!--        <div>
                        <img src="imagem/circulo_orquidea_logo_vale2.png" width="120" height="80" alt=""/>
                    </div>-->
            <ul>
                <li class="myLi">
                    <div>
                        <a href="<?php url_inicio(); ?>formulario_usuario.php"><img src="../imagem/incluir_usuario.png" alt=""/></a>
                    </div>
                </li><br>
                <li class="myLi">
                    <div>
                        <a href="<?php url_inicio(); ?>consulta_usuario.php"><img src="../imagem/consultar_usuario.png" alt=""/></a>
                    </div>
                </li><br>
                <li class="myLi">
                    <div>
                        <a href="<?php url_inicio(); ?>../inicio.php"><img src="/imagem/sair.png" alt=""/></a>

                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <!--    <article>
            <p>Este sistema é para uso do Professores Formadores da SEEDUC-RJ.</p>
            <p>É disponibilizado para criação de cards com conteúdo pedagógico direcionados a Coordenadores Pedagógicos, Orientadores Pedagógicos e Professores.</p>
        </article>-->
</section>
<?php rodape($user); ?>
</div>