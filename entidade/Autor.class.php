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
    private $_email;
    private $_senha;
    private $_perfil;
    private $_facebook_id;
    private $_estado;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($idautor, $imagem, $nome, $email, $senha, $perfil, $facebook_id, $estado) {
        $this->_idautor = $idautor;
        $this->_imagem = $imagem;
        $this->_nome = $nome;
        $this->_email = $email;
        $this->_senha = $senha;
        $this->_perfil = $perfil;
        $this->_facebook_id = $facebook_id;
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

    function getEmail() {
        return $this->_email;
    }

    function getSenha() {
        return $this->_senha;
    }

    function getPerfil() {
        return $this->_perfil;
    }

    function getFacebook_id() {
        return $this->_facebook_id;
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

    function setEmail($email) {
        $this->_email = $email;
    }

    function setSenha($senha) {
        $this->_senha = $senha;
    }

    function setPerfil($perfil) {
        $this->_perfil = $perfil;
    }

    function setFacebook_id($facebook_id) {
        $this->_facebook_id = $facebook_id;
    }

    function setEstado($estado) {
        $this->_estado = $estado;
    }

    function toString() {
        return "ID: " . $this->_idautor . " / Imagem: " . $this->_imagem . " / Nome: " . $this->_nome . " / Email: " . $this->_email . " Senha: " . $this->_senha . "/ Perfil: " . $this->_perfil . " / Facebook_id: " . $this->_facebook_id . " / Estado: " . $this->_estado;
    }

}
