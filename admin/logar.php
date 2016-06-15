<?php

include_once '../entidade/Usuario.class.php';
include_once '../dao/Conexao.class.php';
include_once '../dao/UsuarioDao.class.php';

$usuario = $_POST['inputusuario'];
$senha = $_POST['inputsenha'];

$udao = new UsuarioDao();
$id = $udao->autenticaUsuario($usuario, $senha);
if ($id > 0) {
    $u = new Usuario();

    $udao = new UsuarioDao();
    $u = $udao->getUsuario($id);

    session_start();
    $_SESSION['autentic'] = "sim";
    $_SESSION['cod'] = $u->getIdusuario();
    $_SESSION['usuario'] = $u->getUsuario();
    $_SESSION['usuarioestado'] = $u->getEstado();

    header("Location: ./manage/");
} else {
    header("Location: ./index.php");
}