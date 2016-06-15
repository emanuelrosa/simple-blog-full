<?php

if ($_SESSION['autentic'] !== "sim") {
    session_destroy();
    header("Location: ../");
}

if (isset($_GET['sair'])) {
    $_SESSION['autentic'] = "";
    $_SESSION['usuario'] = "";
    $_SESSION['usuarioestado'] = "";

    session_destroy();
    header("Location: ../");
}

// INCLUDES
function __autoload($nomeClasse) {
    if (file_exists("../../entidade/" . $nomeClasse . ".class.php")) {
        include_once "../../entidade/" . $nomeClasse . ".class.php";
    }
    if (file_exists("../../dao/" . $nomeClasse . ".class.php")) {
        include_once "../../dao/" . $nomeClasse . ".class.php";
    }
}