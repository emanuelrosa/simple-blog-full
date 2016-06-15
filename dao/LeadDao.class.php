<?php

class LeadDao {

    var $p = null;

    function __construct() {
        $this->p = new Conexao();
    }

    function addlead($email) {
        try {
            $stmt = $this->p->prepare("INSERT INTO `lead` (`idlead`, `nome`, `email`, `estado`) VALUES (NULL, ?, ?, ?)");
            $stmt->bindValue(1, "");
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, 'LI');

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
