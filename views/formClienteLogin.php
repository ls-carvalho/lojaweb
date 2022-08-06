<?php
require_once 'includes/cabecalho.inc.php';
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Login do Cliente</h2>
    <p>
        <?php
        session_start();
        if (isset($_SESSION['cliente'])) {
            echo "<p>Você já está logado! Deseja <a href='../controlers/controlerClienteLogin.php?opcao=3'>sair</a>?";
        } else {
        ?>
    <form action="../controlers/controlerClienteLogin.php" method="get">
        Login: <input type="text" size="20" name="pLogin">
        <p>Senha: <input type="text" size="10" name="pSenha">
        <p><input type="submit" value="Login"> <input type="reset" value="Cancelar">
            <input type="hidden" name='opcao' value='1'>
    </form>
    <p>Ainda não é cliente? Cadastre <a href="formClienteCadastro.php">AQUI</a>!</p>
    <p>
    <?php
            if (isset($_REQUEST['erro'])) {
                if ((int)($_REQUEST['erro']) == "1")
                    echo "<b><font face='Verdana' size='2' color='red'>Login Incorreto!</font></b>";
                else
            if ((int)($_REQUEST['erro']) == "2")
                    echo "<b><font face='Verdana' size='2' color='blue'> Você não está logado! Por favor, efetue seu login.</font></b>";
            }
        }
    ?>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>