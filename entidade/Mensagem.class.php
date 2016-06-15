<?php

/**
 * Description of MensagemErro
 *
 * @author CelsoPC
 */
class Mensagem {

    private $_idmensagem;
    private $_datahora;
    private $_nome;
    private $_email;
    private $_mensagem;
    private $_tipo;
    private $_estado;

    function __construct() {
        $this->setAllAtributes(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    }

    function setAllAtributes($idmensagem, $datahora, $nome, $email, $mensagem, $tipo, $estado) {
        $this->_idmensagem = $idmensagem;
        $this->_datahora = $datahora;
        $this->_nome = $nome;
        $this->_email = $email;
        $this->_mensagem = $mensagem;
        $this->_tipo = $tipo;
        $this->_estado = $estado;
    }

    function getIdmensagem() {
        return $this->_idmensagem;
    }

    function getDatahora() {
        return $this->_datahora;
    }

    function getNome() {
        return $this->_nome;
    }

    function getEmail() {
        return $this->_email;
    }

    function getMensagem() {
        return $this->_mensagem;
    }

    function getTipo() {
        return $this->_tipo;
    }

    function getEstado() {
        return $this->_estado;
    }

    function setIdmensagem($idmensagem) {
        $this->_idmensagem = $idmensagem;
    }

    function setDatahora($datahora) {
        $this->_datahora = $datahora;
    }

    function setNome($nome) {
        $this->_nome = $nome;
    }

    function setEmail($email) {
        $this->_email = $email;
    }

    function setMensagem($mensagem) {
        $this->_mensagem = $mensagem;
    }

    function setTipo($tipo) {
        $this->_tipo = $tipo;
    }

    function setEstado($estado) {
        $this->_estado = $estado;
    }

    public function __toString() {
        return "id: " . $this->_idmensagem
                . "| datahora: " . $this->_datahora
                . "| nome: " . $this->_nome
                . "| mensagem: " . $this->_mensagem
                . "| mensagem: " . $this->_tipo
                . "| estado " . $this->_estado
                . " \n";
    }

}
