<?php

// Turn off all error reporting
//error_reporting();

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

//URL do site e url completa atual
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_site = "http://$_SERVER[HTTP_HOST]";

//carrega configuracoes gerais
$config = new Config();
$cdao = new ConfigDao();

$config = $cdao->getConfig();

//adiciona contador se nao for preview
if (!isset($_GET['preview'])) {
    //não adiciona contador de visita
    include "./cont_visita.php";
}

//ler dados metatag pra compartilhamento facebook e postagem
if (isset($_GET['post'])) {
    
    $link = $_GET['post'];

    //pega postagem no banco de dados
    $pdao = new PostDao();
    $p = new Post();
    $p = $pdao->getPostByLink($link);
}

//carrega dados redes sociais
$s = new Social();
$sdao = new SocialDao();

$s = $sdao->getSocial();
?>