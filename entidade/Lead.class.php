<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lead
 *
 * @author CelsoPC
 */
class Lead {

    private $_idlead;
    private $_nome;
    private $_email;
    private $_estado;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($_idlead, $_nome, $_email, $_estado) {
        $this->_idlead = $_idlead;
        $this->_nome = $_nome;
        $this->_email = $_email;
        $this->_estado = $_estado;
    }

    function getIdLead() {
        return $this->_idlead;
    }

    function getNome() {
        return $this->_nome;
    }

    function getEmail() {
        return $this->_email;
    }

    function getEstado() {
        return $this->_estado;
    }

    function setIdLead($idlead) {
        $this->_idlead = $idlead;
    }

    function setNome($nome) {
        $this->_nome = $nome;
    }

    function setEmail($email) {
        $this->_email = $email;
    }

    function setEstado($estado) {
        $this->_estado = $estado;
    }

    function toString() {
        return "ID: " . $this->_idlead . " / Nome: " . $this->_nome . " / Email: " . $this->_email . " / Estado: " . $this->_estado;
    }

}
