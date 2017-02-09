<?php

// Turn off all error reporting
error_reporting();

setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('Europe/Lisbon');

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
$opdao = new OptionConfigDao();
$op = $opdao->getOptionConfig();

$actual_site = "http://$_SERVER[HTTP_HOST]";
$actual_ano = "";

if ($op['siteurl'] !== '' || !is_null($op['siteurl'])) {
    $actual_site = $op['siteurl'];
}
if ($op['siteurl'] !== '' || !is_null($op['siteurl'])) {
    $actual_ano = $op['anocriado'] . ' - ';
}
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

    $actual_link = $op['siteurl'] . '/' . $p->getLink();

    //pega autor da postagem
    $a = new Autor();
    $adao = new AutorDao();
    $a = $adao->getAutorById($p->getIdautor());
}

//carrega dados redes sociais
$s = new Social();
$sdao = new SocialDao();

$s = $sdao->getSocial();
?>