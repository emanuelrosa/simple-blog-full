<?php
$i = new Institucional();

$idao = new InstitucionalDao();
$i = $idao->getInstitucional("privacidade");

if($i->getEstado() > 0) {
    echo $i->getTexto();
}
?>