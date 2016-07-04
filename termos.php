<?php
$i = new Institucional();

$idao = new InstitucionalDao();
$i = $idao->getInstitucional("termosuso");

if($i->getEstado() > 0) {
    echo $i->getTexto();
}
?>