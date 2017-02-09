<?php

session_start();

// Turn off all error reporting
error_reporting();

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

// INCLUDES
function __autoload($nomeClasse) {
    if (file_exists("../entidade/" . $nomeClasse . ".class.php")) {
        include_once "../entidade/" . $nomeClasse . ".class.php";
    }
    if (file_exists("../dao/" . $nomeClasse . ".class.php")) {
        include_once "../dao/" . $nomeClasse . ".class.php";
    }
}

if ($_SESSION['autentication'] != 1) {
    session_destroy();
    header("Location: ../");
}

if (isset($_GET['sair'])) {
    session_destroy();
    header("Location: ../");
}

//URL página atual
$opdao = new OptionConfigDao();
$op = $opdao->getOptionConfig();

if ($op['siteurl'] === '' || is_null($op['siteurl'])) {
    $actual_site = "http://$_SERVER[HTTP_HOST]";
} else {
    $actual_site = $op['siteurl'];
}

//carrega configuracoes gerais
$config = new Config();
$cdao = new ConfigDao();

$config = $cdao->getConfig();

//pego informações do autor
$a = new Autor();
$adao = new AutorDao();

$a = $adao->getAutorByEmail($_SESSION['email']);
