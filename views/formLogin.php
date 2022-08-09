<?php
require_once 'includes/autenticarMenu.inc.php';
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
        <input type="hidden" name="opcao" value="2">
    </form>
    <p>
        <?php
        if (isset($_REQUEST['erro'])) {
            if ((int)($_REQUEST['erro']) == "1")
                echo "<b><font face='Verdana' size='2' color='red'>Login Incorreto!</font></b>";
            else
            if ((int)($_REQUEST['erro']) == "2")
                echo "<b><font face='Verdana' size='2' color='blue'> Por favor, efetue seu login novamente.</font></b>";
            else
            if ((int)($_REQUEST['erro']) == "3")
                echo "<b><font face='Verdana' size='2' color='blue'> Acesso não autorizado! Efetue seu login de administrador para prosseguir.</font></b>";
        }
        ?>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>