<?php
require_once 'includes/cabecalho.inc.php';
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Login do Cliente</h2>
    <p>
    <form action="../controlers/controlerClienteLogin.php" method="get">
        Login: <input type="text" size="20" name="pLogin">
        <p>Senha: <input type="text" size="10" name="pSenha">
        <p><input type="submit" value="Login"> <input type="reset" value="Cancelar">
            <input type="hidden" name='opcao' value='1'>
    </form>
    <p>
        <?php
        if (isset($_REQUEST['erro'])) {
            if ((int)($_REQUEST['erro']) == "1")
                echo "<b><font face='Verdana' size='2' color='red'>Login Incorreto!</font></b>";
            else
            if ((int)($_REQUEST['erro']) == "2")
                echo "<b><font face='Verdana' size='2' color='blue'> Por favor, efetue seu login.</font></b>";
        }
        ?>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>