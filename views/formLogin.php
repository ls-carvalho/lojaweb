<?php
require_once 'includes/cabecalho.inc.php';
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h2>Login do Sistema</h2>
    <p>
    <form action="../controlers/controlerLogin.php" method="get">
        Login: <input type="text" size="20" name="pLogin">
        <p>Senha: <input type="text" size="10" name="pSenha">
        <p>Tipo de Usuário:
            <select name="pTipo">
                <option value="1">Administrador</option>>
                <option value="2">Cliente</option>
            </select>
        <p><input type="submit" value="Login"> <input type="reset" value="Cancelar">
    </form>
    <p>
    <?php
    if (isset($_REQUEST['erro'])) {
        if ((int)($_REQUEST['erro']) == "1")
            echo "<b><font face='Verdana' size='2' color='red'>Login Incorreto!</font></b>";
        else
            if ((int)($_REQUEST['erro']) == "2")
            echo "<b><font face='Verdana' size='2' color='blue'> Por favor, efetue seu login novamente.</font></b>";
    }
    ?>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>