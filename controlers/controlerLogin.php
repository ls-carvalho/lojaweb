<?php
    require_once('../dao/conexao.inc.php');

    function efetuarLogin($login, $senha){
        $con = new Conexao();
        $conexao = $con->getConexao();

        $sql = $conexao->prepare("select * from usuarios where login = :usr and senha = :pass");

        $login = strtolower($login);
        $senha = strtolower($senha);
        $sql->bindValue(':usr',$login);
        $sql->bindValue(':pass',$senha);
        $sql->execute();

        $count = $sql->rowCount();

        if($count==1){
            return true;
        }else{
            return false;
        }
    }

    $tipo = $_REQUEST['pTipo'];
    $login = $_REQUEST['pLogin'];
    $senha = $_REQUEST['pSenha'];

    if($tipo=="1"){
        $logado = efetuarLogin($login,$senha);
        if($logado){
            session_start();

            $_SESSION['logado'] = true;
            $_SESSION['tipousuario'] = '1';
            header('Location:../views/index.php');
        }
    }else if($tipo=="2"){
        $logado = efetuarLogin($login,$senha);
        if($logado){
            session_start();

            $_SESSION['logado'] = true;
            $_SESSION['tipousuario'] = '2';
            header('Location:../views/index.php');
        }
    }
?>