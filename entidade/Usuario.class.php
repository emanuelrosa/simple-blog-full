<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author CelsoPC
 */
class Usuario {

    private $_idusuario;
    private $_usuario;
    private $_senha;
    private $_tipo;
    private $_estado;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($_idusuario, $_usuario, $_senha, $_tipo, $_estado) {
        $this->_idusuario = $_idusuario;
        $this->_usuario = $_usuario;
        $this->_senha = $_senha;
        $this->_tipo = $_tipo;
        $this->_estado = $_estado;
    }

    function getIdusuario() {
        return $this->_idusuario;
    }

    function getUsuario() {
        return $this->_usuario;
    }

    function getSenha() {
        return $this->_senha;
    }

    function getTipo() {
        return $this->_tipo;
    }

    function getEstado() {
        return $this->_estado;
    }

    function setIdusuario($idusuario) {
        $this->_idusuario = $idusuario;
    }

    function setUsuario($usuario) {
        $this->_usuario = $usuario;
    }

    function setSenha($senha) {
        $this->_senha = $senha;
    }

    function setTipo($tipo) {
        $this->_tipo = $tipo;
    }

    function setEstado($estado) {
        $this->_estado = $estado;
    }

    function toString() {
        return "ID: " . $this->_idusuario . " "
                . "/ Usuário: " . $this->_usuario . " "
                . "/ Senha: " . $this->_senha . " "
                . "/ tipo: " . $this->_tipo . " "
                . "/ Estado: " . $this->_estado;
    }

}
