<?php

/**
 * Description of Config
 *
 * @author CelsoPC
 */
class OptionConfig {

    private $_idoptions_config;
    private $_option_nome;
    private $_option_valor;
    private $_autoload;

    function __construct() {
        $this->setAllConstruct(NULL, NULL, NULL, NULL);
    }

    function setAllConstruct($idoptions_config, $option_nome, $option_valor, $autoload) {
        $this->_idoptions_config = $idoptions_config;
        $this->_option_nome = $option_nome;
        $this->_option_valor = $option_valor;
        $this->_autoload = $autoload;
    }

    function getIdoptions_config() {
        return $this->_idoptions_config;
    }

    function getOption_nome() {
        return $this->_option_nome;
    }

    function getOption_valor() {
        return $this->_option_valor;
    }

    function getAutoload() {
        return $this->_autoload;
    }

    function setIdoptions_config($idoptions_config) {
        $this->_idoptions_config = $idoptions_config;
    }

    function setOption_nome($option_nome) {
        $this->_option_nome = $option_nome;
    }

    function setOption_valor($option_valor) {
        $this->_option_valor = $option_valor;
    }

    function setAutoload($autoload) {
        $this->_autoload = $autoload;
    }

}

?>