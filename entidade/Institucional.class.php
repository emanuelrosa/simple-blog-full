<?php

/**
 * Description of Institucional
 *
 * @author CelsoPC
 */
class Institucional {

    private $_idinstitucional;
    private $_area;
    private $_texto;
    private $_estado;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($idinstitucional, $area, $texto, $estado) {
        $this->_idinstitucional = $idinstitucional;
        $this->_area = $area;
        $this->_texto = $texto;
        $this->_estado = $estado;
    }

    function getIdinstitucional() {
        return $this->_idinstitucional;
    }

    function getArea() {
        return $this->_area;
    }

    function getTexto() {
        return $this->_texto;
    }

    function getEstado() {
        return $this->_estado;
    }

    function setIdinstitucional($idinstitucional) {
        $this->_idinstitucional = $idinstitucional;
    }

    function setArea($area) {
        $this->_area = $area;
    }

    function setTexto($texto) {
        $this->_texto = $texto;
    }

    function setEstado($estado) {
        $this->_estado = $estado;
    }

    public function __toString() {
        return "Id: " . $this->_idsobre
                . "| area: " . $this->_area
                . "| texto: " . $this->_texto
                . "| estado: " . $this->_estado
                . " \n ";
    }

}
