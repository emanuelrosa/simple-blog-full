<?php

/**
 * Description of Config
 *
 * @author CelsoPC
 */
class Config {

    private $_idconfig;
    private $_gifload;
    private $_imglogo;
    private $_imgtopo;
    private $_imgsocial;
    private $_imglogoadmin;
    private $_titulo;
    private $_descricao;
    private $_autor;
    private $_header;
    private $_body;
    private $_palavra_chave;
    private $_appid_facebook;
    private $_num_comentarios_visivel;
    private $_facebook_id;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($idconfig, $gifload, $imglogo, $imgtopo, $imgsocial, $imglogoadmin, $titulo, $descricao, $autor, $header, $body, $palavra_chave, $appid_facebook, $num_comentarios_visivel, $facebook_id) {
        $this->_idconfig = $idconfig;
        $this->_gifload = $gifload;
        $this->_imglogo = $imglogo;
        $this->_imgtopo = $imgtopo;
        $this->_imgsocial = $imgsocial;
        $this->_imglogoadmin = $imglogoadmin;
        $this->_titulo = $titulo;
        $this->_descricao = $descricao;
        $this->_autor = $autor;
        $this->_header = $header;
        $this->_body = $body;
        $this->_palavra_chave = $palavra_chave;
        $this->_appid_facebook = $appid_facebook;
        $this->_num_comentarios_visivel = $num_comentarios_visivel;
        $this->_facebook_id = $facebook_id;
    }

    function getIdconfig() {
        return $this->_idconfig;
    }

    function getGifload() {
        return $this->_gifload;
    }

    function getImglogo() {
        return $this->_imglogo;
    }

    function getImgtopo() {
        return $this->_imgtopo;
    }

    function getImgsocial() {
        return $this->_imgsocial;
    }

    function getImglogoadmin() {
        return $this->_imglogoadmin;
    }

    function getTitulo() {
        return $this->_titulo;
    }

    function getDescricao() {
        return $this->_descricao;
    }

    function getAutor() {
        return $this->_autor;
    }

    function getHeader() {
        return $this->_header;
    }

    function getBody() {
        return $this->_body;
    }

    function getPalavra_chave() {
        return $this->_palavra_chave;
    }

    function getAppid_facebook() {
        return $this->_appid_facebook;
    }

    function getNum_comentarios_visivel() {
        return $this->_num_comentarios_visivel;
    }

    function getFacebook_id() {
        return $this->_facebook_id;
    }

    function setIdconfig($idconfig) {
        $this->_idconfig = $idconfig;
    }

    function setGifload($gifload) {
        $this->_gifload = $gifload;
    }

    function setImglogo($imglogo) {
        $this->_imglogo = $imglogo;
    }

    function setImgtopo($imgtopo) {
        $this->_imgtopo = $imgtopo;
    }

    function setImgsocial($imgsocial) {
        $this->_imgsocial = $imgsocial;
    }

    function setImglogoadmin($imglogoadmin) {
        $this->_imglogoadmin = $imglogoadmin;
    }

    function setTitulo($titulo) {
        $this->_titulo = $titulo;
    }

    function setDescricao($descricao) {
        $this->_descricao = $descricao;
    }

    function setAutor($autor) {
        $this->_autor = $autor;
    }

    function setHeader($header) {
        $this->_header = $header;
    }

    function setBody($body) {
        $this->_body = $body;
    }

    function setPalavra_chave($palavra_chave) {
        $this->_palavra_chave = $palavra_chave;
    }

    function setAppid_facebook($appid_facebook) {
        $this->_appid_facebook = $appid_facebook;
    }

    function setNum_comentarios_visivel($num_comentarios_visivel) {
        $this->_num_comentarios_visivel = $num_comentarios_visivel;
    }

    function setFacebook_id($facebook_id) {
        $this->_facebook_id = $facebook_id;
    }

    
    public function __toString() {
        return "ID: " . $this->_idconfig
                . "| GifLoad: " . $this->_gifload
                . "| imglogo: " . $this->_imglogo
                . "| imgtopo: " . $this->_imgtopo
                . "| imgsocial: " . $this->_imgsocial
                . "| imglogoadm: " . $this->_imglogoadmin
                . "| titulo: " . $this->_titulo
                . "| descricao: " . $this->_descricao
                . "| autor: " . $this->_autor
                . "| header: " . $this->_header
                . "| body: " . $this->_body
                . "| palavra-chave: " . $this->_palavra_chave
                . "| appid_facebook: " . $this->_appid_facebook
                . "| num_comentarios_visual: " . $this->_num_comentarios_visivel
                . "| facebook_id: " . $this->_facebook_id;
    }

}
