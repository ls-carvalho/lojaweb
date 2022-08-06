<?php
require_once('../dao/conexao.inc.php');
require_once('../dao/clienteDAO.inc.php');

function efetuarLogin($login, $senha)
{
    $con = new Conexao();
    $conexao = $con->getConexao();
    $sql = $conexao->prepare("SELECT * FROM usuarios WHERE login = :usr AND senha = :pass");
    $login = strtolower($login);
    $senha = strtolower($senha);
    $sql->bindValue(':usr', $login);
    $sql->bindValue(':pass', $senha);
    $sql->execute();
    $count = $sql->rowCount();
    if ($count == 1) {
        return true;
    } else {
        return false;
    }
}

$tipo = $_REQUEST['pTipo'];
$login = $_REQUEST['pLogin'];
$senha = $_REQUEST['pSenha'];

if ($tipo == "1") {
    $logado = efetuarLogin($login, $senha);
    if ($logado) {
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['tipousuario'] = '1';
        header('Location:../views/index.php');
    }
} else if ($tipo == "2") {
    $logado = efetuarLogin($login, $senha);
    if ($logado) {
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['tipousuario'] = '2';
        $clienteDao = new ClienteDAO();
        $_SESSION['cliente'] = $clienteDao->autenticar($login, $senha);
        header('Location:../views/index.php');
    }
}

$opcao = $_REQUEST['opcao'];
if ($opcao == 1) { //Logout
    session_start();
    if (isset($_SESSION['logado'])) {
        unset($_SESSION['logado']);
        if ($_SESSION['tipousuario'] == '2' && isset($_SESSION['cliente'])) {
            unset($_SESSION['cliente']);
        }
        unset($_SESSION['tipousuario']);
    }
    header('Location:../views/formLogin.php');
}
