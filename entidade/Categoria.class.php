<?php

/**
 * Description of Categoria
 *
 * @author CelsoPC
 */
class Categoria {

    private $_idcategoria;
    private $_categoria_idcategoria;
    private $_nome;
    private $_slug;
    private $_descricao;
    private $_estado;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($idcategoria, $categoria_idcategoria, $nome, $slug, $descricao, $estado) {
        $this->_idcategoria = $idcategoria;
        $this->_categoria_idcategoria = $categoria_idcategoria;
        $this->_nome = $nome;
        $this->_slug = $slug;
        $this->_descricao = $descricao;
        $this->_estado = $estado;
    }

    function getIdcategoria() {
        return $this->_idcategoria;
    }

    function getCategoria_idcategoria() {
        return $this->_categoria_idcategoria;
    }

    function getNome() {
        return $this->_nome;
    }

    function getSlug() {
        return $this->_slug;
    }

    function getDescricao() {
        return $this->_descricao;
    }

    function getEstado() {
        return $this->_estado;
    }

    function setIdcategoria($idcategoria) {
        $this->_idcategoria = $idcategoria;
    }

    function setCategoria_idcategoria($categoria_idcategoria) {
        $this->_categoria_idcategoria = $categoria_idcategoria;
    }

    function setNome($nome) {
        $this->_nome = $nome;
    }

    function setSlug($slug) {
        $this->_slug = $slug;
    }

    function setDescricao($descricao) {
        $this->_descricao = $descricao;
    }

    function setEstado($estado) {
        $this->_estado = $estado;
    }

    function toString() {
        return "ID: " . $this->_idcategoria . " / Categoria_idCategoria: " . $this->_categoria_idcategoria . " / Nome: " . $this->_nome . " / Slug: " . $this->_slug. " / Descrição: " . $this->_descricao . " / Estado: " . $this->_estado . " /n ";
    }

}
