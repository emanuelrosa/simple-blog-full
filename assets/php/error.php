<?php

// INCLUDES
function __autoload($nomeClasse) {
    if (file_exists("../../entidade/" . $nomeClasse . ".class.php")) {
        include_once "../../entidade/" . $nomeClasse . ".class.php";
    }
    if (file_exists("../../dao/" . $nomeClasse . ".class.php")) {
        include_once "../../dao/" . $nomeClasse . ".class.php";
    }
}

$m = new Mensagem();
$mdao = new MensagemDao();

$datahora = date("Y-m-d H:i:s");
$nome = $_POST["name"];
$email = $_POST["email"];
$mensagem = "Mensagem enviada pelo site: " . $_POST["message"];
$tipo = "E"; //S - msg site , E - error
$estado = "0"; // 0 - não conferido , 1 - conferido
$visto = "0"; // 0 - não visto

$m->setAllAtributes(null, $datahora, $nome, $email, $mensagem, $tipo, $estado, $visto);

if ($mdao->inserirMesagem($m)) {
    echo "OK|Mensagem enviada com sucesso!";
}

//envia email para administrador
$destino = ""; //email administrador
$assunto = "[" . $_SERVER[HTTP_HOST] . "] Contato do formulario do site!";

// É necessário indicar que o formato do e-mail é html
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $nome . ' <' . $email . '>';


if (mail($destino, $assunto, $mensagem, $headers)) {
    //echo "OK|Mensagem enviada com sucesso!";
} else {
    //echo "ERROR|";
}
?>