<?php

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

// INCLUDES
function __autoload($nomeClasse) {
    if (file_exists("./entidade/" . $nomeClasse . ".class.php")) {
        include_once "./entidade/" . $nomeClasse . ".class.php";
    }
    if (file_exists("./dao/" . $nomeClasse . ".class.php")) {
        include_once "./dao/" . $nomeClasse . ".class.php";
    }
}


//URL página atual
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_site = "http://$_SERVER[HTTP_HOST]/blogmodelo.com.br/";



//carrega configuracoes gerais
$config = new Config();
$cdao = new ConfigDao();

$config = $cdao->getConfig();
?>