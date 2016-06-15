<?php

$nome = $_POST['name'];
$email = $_POST['email'];
$mensagem = "Mensagem enviada pelo site: " . $_POST['message'];

$destino = "celsomf@mfagencia.com.br";
$assunto = "[mfagencia.com.br] Contato do formulario do site!";

// É necessário indicar que o formato do e-mail é html
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $nome. ' <' . $email . '>';


if (mail($destino, $assunto, $mensagem, $headers)) {
    echo "OK|Mensagem enviada com sucesso!";
} else {
    echo "ERROR|";
}
?>