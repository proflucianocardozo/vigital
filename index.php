
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>

<?php
require('require.php');
include('funcao.php');
cabecalho();
?>
<br>

<form name='principal' method='post' action='auth.php' onSubmit = "
        if ((document.principal.user.value == '') && (document.principal.pass.value == ''))
        {
            alert('Informe o usuário/senha!');
            return false;
        }">
    Usuário: <input type='text' size='15' maxlength='20' name='user' />
    Senha: <input type='password' size='15' maxlength='20' name='pass'>
    <!-- o correto é o abaixo <a href ="auth.php"><IMG SRC="icones/accept.png"></a>-->
    <input type='image' src='imagem/user.png' alt='submit'>
    <br>
    <?php
    $erro = $_GET['m'];
    if ($erro == 1) {
        echo "
                            <B>
                                    <FONT FACE='Arial' COLOR='white' SIZE='+1'>Login Incorreto!</FONT>
                            </B>";
    }
    if ($erro == 2) {
        echo "
                            <B>
                                <td>
                                    <FONT FACE='Arial' COLOR='white' SIZE='+1'>Acesso Restrito!</FONT>
                                </td>
                            </B>";
    }
    if ($erro == 3) {
        echo "
                            <B>
                                <td>
                                    <FONT FACE='Arial' COLOR='white' SIZE='+1'>Sessão Expirada!</FONT>
                                </td>
                            </B>";
        session_destroy();
    }
    ?>
<!--    <p>
        <a href = 'ajuda/index.php'>Ajuda</a>
    </p>-->

</form><br>
<?php rodape($user); ?>
