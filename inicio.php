<?php
require('require.php');
include('funcao.php');

cabecalho();

$user = $_SESSION['MeuLogin']['login'];
$idUsu = $_SESSION['MeuLogin']['idUsu'];
$categ = $_SESSION['Identifi']['categoria_id'];
$ativo = $_SESSION['Identifi']['usuario_ativo'];
//echo $user,$idUsu,$categ,$ativo;

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
                        <a href="<?php url_inicio(); ?>formulario_conhecimento.php"><img class="imagem" src="imagem/cadastrar_conhecimento.png" alt=""/></a>
                    </div>
                </li><br>
                <li class="myLi">
                    <div>
                        <a href="<?php url_inicio(); ?>consulta_conteudo.php"><img class="imagem" src="imagem/consulta_conteudo.png" alt=""/></a>
                    </div>
                </li><br>
                <!--                <li class="myLi">
                                    <div>
                                        <a href="<?php url_inicio(); ?>exclui_conteudo.php"><img src="imagem/exclui_conteudo.png" alt=""/></a>
                                    </div>
                                </li>-->
                <li class="myLi">
                    <div>
                        <a href="<?php url_inicio(); ?>usuario/usuario.php"><img class="imagem" src="imagem/usuario.png" alt=""/></a>
                    </div>
                </li><br>
                <li class="myLi">
                    <div>
                        <a href="<?php
                        url_inicio();
                        ?>logout.php"><img class="imagem" src="/imagem/sair.png" alt=""/></a>

                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <!--        <article>
                <p>Este sistema é para uso do Professores e Alunos do Colégio Estadual Buarque de Nazareth</p>
                <p>É disponibilizado para criação de cards com conteúdo pedagógico direcionados a Coordenadores Pedagógicos, Orientadores Pedagógicos e Professores.</p>
            </article>-->
</section>
<?php rodape($user); ?>
</div>