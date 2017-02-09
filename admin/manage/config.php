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

//URL página atual
$opdao = new OptionConfigDao();
$op = $opdao->getOptionConfig();

$actual_site = "http://$_SERVER[HTTP_HOST]";
$actual_ano = "";

if ($op['siteurl'] !== '' || !is_null($op['siteurl'])) {
    $actual_site = $op['siteurl'];
}
if ($op['siteurl'] !== '' || !is_null($op['siteurl'])) {
    $actual_ano = $op['anocriado'];
}

//carrega configuracoes gerais
$config = new Config();
$cdao = new ConfigDao();

$config = $cdao->getConfig();
