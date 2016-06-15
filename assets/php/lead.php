<?php
require_once '../../dao/Conexao.class.php'; 
require_once '../../dao/LeadDao.class.php'; 

$email = $_POST['email'];

$ldao = new LeadDao();
if($ldao->addlead($email) > 0){
    echo "OK|Obrigado, logo enviaremos novidades para você.";
} else {
    echo "Error|Infelismente não deu, tenta mais tarde!";
}

?>