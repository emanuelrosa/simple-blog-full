<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autor
 *
 * @author CelsoPC
 */
class Autor {

    private $_idautor;
    private $_imagem;
    private $_nome;
    private $_perfil;
    private $_estado;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($idautor, $imagem, $nome, $perfil, $estado) {
        $this->_idautor = $idautor;
        $this->_imagem = $imagem;
        $this->_nome = $nome;
        $this->_perfil = $perfil;
        $this->_estado = $estado;
    }

    function getIdautor() {
        return $this->_idautor;
    }

    function getImagem() {
        return $this->_imagem;
    }

    function getNome() {
        return $this->_nome;
    }

    function getPerfil() {
        return $this->_perfil;
    }

    function getEstado() {
        return $this->_estado;
    }

    function setIdautor($idautor) {
        $this->_idautor = $idautor;
    }

    function setImagem($imagem) {
        $this->_imagem = $imagem;
    }

    function setNome($nome) {
        $this->_nome = $nome;
    }

    function setPerfil($perfil) {
        $this->_perfil = $perfil;
    }

    function setEstado($estado) {
        $this->_estado = $estado;
    }

    function toString() {
        return "ID: " . $this->_idautor . " / Imagem: " . $this->_imagem . " / Nome: " . $this->_nome . " / Perfil: " . $this->_perfil . " / Estado: " . $this->_estado;
    }

}
