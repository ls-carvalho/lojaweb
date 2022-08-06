<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['tipousuario'] == '1') {
    require_once 'includes/cabecalho.inc.php';
} else {
    require_once 'includes/cabecalhoPublico.inc.php';
}
