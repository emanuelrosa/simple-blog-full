<?php

/**
 * Description of Post
 *
 * @author CelsoPC
 */
class Post {

    private $_idpost;
    private $_idautor;
    private $_link;
    private $_tags;
    private $_imagem;
    private $_titulo;
    private $_datahora;
    private $_resumo;
    private $_materia;
    private $_estado;
    private $_comentario;
    private $_idcategoria;
    private $_categoria;
    private $_nomeautor;
    private $_aberto;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($idpost, $idautor, $link, $tags, $imagem, $titulo, $datahora, $resumo, $materia, $estado, $comentario, $aberto) {
        $this->_idpost = $idpost;
        $this->_idautor = $idautor;
        $this->_link = $link;
        $this->_tags = $tags;
        $this->_imagem = $imagem;
        $this->_titulo = $titulo;
        $this->_datahora = $datahora;
        $this->_resumo = $resumo;
        $this->_materia = $materia;
        $this->_estado = $estado;
        $this->_comentario = $comentario;
        $this->_aberto = $aberto;
    }

    function getIdpost() {
        return $this->_idpost;
    }

    function getIdautor() {
        return $this->_idautor;
    }

    function getLink() {
        return $this->_link;
    }

    function getTags() {
        return $this->_tags;
    }

    function getImagem() {
        return $this->_imagem;
    }

    function getTitulo() {
        return $this->_titulo;
    }

    function getDatahora() {
        return $this->_datahora;
    }

    function getResumo() {
        return $this->_resumo;
    }

    function getMateria() {
        return $this->_materia;
    }

    function getEstado() {
        return $this->_estado;
    }

    function getComentario() {
        return $this->_comentario;
    }

    function getIdcategoria() {
        return $this->_idcategoria;
    }

    function getCategoria() {
        return $this->_categoria;
    }

    function getNomeautor() {
        return $this->_nomeautor;
    }

    function getAberto() {
        return $this->_aberto;
    }

    function setIdpost($idpost) {
        $this->_idpost = $idpost;
    }

    function setIdautor($idautor) {
        $this->_idautor = $idautor;
    }

    function setLink($link) {
        $this->_link = $link;
    }

    function setTags($tags) {
        $this->_tags = $tags;
    }

    function setImagem($imagem) {
        $this->_imagem = $imagem;
    }

    function setTitulo($titulo) {
        $this->_titulo = $titulo;
    }

    function setDatahora($datahora) {
        $this->_datahora = $datahora;
    }

    function setResumo($resumo) {
        $this->_resumo = $resumo;
    }

    function setMateria($materia) {
        $this->_materia = $materia;
    }

    function setEstado($estado) {
        $this->_estado = $estado;
    }

    function setComentario($comentario) {
        $this->_comentario = $comentario;
    }

    function setIdcategoria($idcategoria) {
        $this->_idcategoria = $idcategoria;
    }

    function setCategoria($categoria) {
        $this->_categoria = $categoria;
    }

    function setNomeautor($nomeautor) {
        $this->_nomeautor = $nomeautor;
    }
    
    function setAberto($aberto) {
        $this->_aberto = $aberto;
    }

    public function __toString() {
        return "id = " . $this->_idpost . " | "
                . "idautor =" . $this->_idautor . " | "
                . "link =" . $this->_link . " | "
                . "tags =" . $this->_tags . " | "
                . "imagem = " . $this->_imagem . " | "
                . "titulo = " . $this->_titulo . " | "
                . "datahota = " . $this->_datahora . " | "
                . "resumo = " . $this->_resumo . " | "
                . "materia = " . $this->_materia . " | "
                . "estado = " . $this->_estado . " | "
                . "comentario = " . $this->_comentario . " |"
                . "aberto = " . $this->_aberto . "  /n";
    }

}
