<?php


$v = new Visita();

$idvisita = null;
$data = date("Y-m-d");
$hora = date("H:i:s");
$ip = $_SERVER["REMOTE_ADDR"];
$url = $_SERVER["REQUEST_URI"];
$cont = 1;

$v->setAllAtributes($idvisita, $data, $hora, $ip, $url, $cont);

//busca no banco se o usuário já esteve aqui hoje
$vdao = new VisitaDao();
$rs = $vdao->findVisita($v);

//verficia se o usuario já fez a visita hoje
if ($rs->rowCount() > 0) {
    //verifica se a página URL ja foi visitada hj
    $vdao = new VisitaDao();
    $rs = $vdao->findVisitaUrl($v);

    if ($rs->rowCount() > 0) {
        //insere pagevew para url
        $vdao = new VisitaDao();
        $rs = $vdao->inserePageview($v);
    } else {
        //insere nova visualizacao
        $vdao = new VisitaDao();
        $vdao->inserirNovaVisita($v);
    }
} else {
    //insere nova visualizacao
    $vdao = new VisitaDao();
    $vdao->inserirNovaVisita($v);
}
?>