<?php
session_start();
$estado = $_SESSION['logado'];
if (!$estado || !isset($_SESSION['logado'])) {
    header("Location:formLogin.php?erro=2");
}
    //No topo de cada pagina restrita:
    //require_once 'includes/autenticar.inc.php';