<?php

class Visita {

    private $_idvisita;
    private $_data;
    private $_hora;
    private $_ip;
    private $_url;
    private $_cont;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($idvisita, $data, $hora, $ip, $url, $cont) {
        $this->_idvisita = $idvisita;
        $this->_data = $data;
        $this->_hora = $hora;
        $this->_ip = $ip;
        $this->_url = $url;
        $this->_cont = $cont;
    }

    function getIdvisita() {
        return $this->_idvisita;
    }

    function getData() {
        return $this->_data;
    }

    function getHora() {
        return $this->_hora;
    }

    function getIp() {
        return $this->_ip;
    }

    function getUrl() {
        return $this->_url;
    }

    function getCont() {
        return $this->_cont;
    }

    function setIdvisita($idvisita) {
        $this->_idvisita = $idvisita;
    }

    function setData($data) {
        $this->_data = $data;
    }

    function setHora($hora) {
        $this->_hora = $hora;
    }

    function setIp($ip) {
        $this->_ip = $ip;
    }

    function setUrl($url) {
        $this->_url = $url;
    }

    function setCont($cont) {
        $this->_cont = $cont;
    }

    public function __toString() {

        function toString() {
            return " | ID: " . $this->_idvisita . " "
                    . "/ data: " . $this->_data . " "
                    . "/ hora: " . $this->_hora . " "
                    . "/ ip: " . $this->_ip . " "
                    . "/ url: " . $this->_url . " "
                    . "/ cont: " . $this->_cont;
        }

    }

}

?>