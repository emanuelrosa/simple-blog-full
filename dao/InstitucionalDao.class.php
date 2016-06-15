<?php

/**
 * Description of InstitucionalDao
 *
 * @author CelsoPC
 */
class InstitucionalDao {

    private $p = null;

    function __construct() {
        $this->p = new Conexao();
    }

    function editInstitucional(Institucional $ins) {
        try {
            $stmt = $this->p->prepare("UPDATE `institucional` SET `texto` = ?, `estado` = ? WHERE `idinstitucional` = ?;");
            $stmt->bindValue(1, $ins->getTexto());
            $stmt->bindValue(2, $ins->getEstado());
            $stmt->bindValue(3, $ins->getIdinstitucional());

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function getInstitucional($search) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `institucional` WHERE `area` LIKE ? ");
            $stmt->bindValue(1, $search);
            $stmt->execute();

            $ins = new Institucional();
            foreach ($stmt as $row) {
                $ins->setAllAtributes($row['idinstitucional'], $row['area'], $row['texto'], $row['estado']);
            }

            $this->p = null;

            return $ins;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
