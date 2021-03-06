<?php

/**
 * Description of VisitaDao
 *
 * @author CelsoPC
 */
class VisitaDao {

    private $p = null;

    function __construct() {
        $this->p = new Conexao();
    }

    function inserirNovaVisita(Visita $v) {
        try {
            $stmt = $this->p->prepare("INSERT INTO `visita` (`idvisita`, `data`, `hora`, `ip`, `url`, `cont`) VALUES (?, ?, ? ,? ,? ,?)");
            $stmt->bindValue(1, $v->getIdvisita());
            $stmt->bindValue(2, $v->getData());
            $stmt->bindValue(3, $v->getHora());
            $stmt->bindValue(4, $v->getIp());
            $stmt->bindValue(5, $v->getUrl());
            $stmt->bindValue(6, $v->getCont());

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function findVisita(Visita $v) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `visita` WHERE `ip` = ? AND `data` = ?");
            $stmt->bindValue(1, $v->getIp());
            $stmt->bindValue(2, $v->getData());

            $stmt->execute();

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function findVisitaUrl(Visita $v) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `visita` WHERE `ip` = ? AND `data` = ? AND `url` = ?");
            $stmt->bindValue(1, $v->getIp());
            $stmt->bindValue(2, $v->getData());
            $stmt->bindValue(3, $v->getUrl());

            $stmt->execute();

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function inserePageview(Visita $v) {
        try {
            $stmt = $this->p->prepare("UPDATE `visita` SET `cont` = `cont` + 1 WHERE `ip` = ? AND `url` = ? AND `data` = ?");
            $stmt->bindValue(1, $v->getIp());
            $stmt->bindValue(2, $v->getUrl());
            $stmt->bindValue(3, $v->getData());

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listUltamasVisitasSemana() {
        try {
            $stmt = $this->p->query("SELECT *, sum(cont) as cont FROM `visita` WHERE `data` BETWEEN CURRENT_DATE() - INTERVAL 7 DAY AND CURRENT_DATE() group by data DESC");
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listPostsMaisVisitadosSemana() {
        try {
            $stmt = $this->p->query("SELECT *, sum(cont) as cont FROM `visita` WHERE 
                `data` BETWEEN CURRENT_DATE() - INTERVAL 7 DAY AND CURRENT_DATE() AND 
                ((`url` != '/about') AND (`url` != '/terms') AND (`url` != '/privacy') AND (`url` != '/contact') ) group by url ORDER BY cont DESC LIMIT 0 , 10");

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getCountAllView() {
        try {
            $stmt = $this->p->query("SELECT sum(cont) AS cont FROM `visita` ");

            $c = 0;
            foreach ($stmt as $row) {
                $c = $row['cont'];
            }

            return $c;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    
    public function getCountViewLastMonth() {
        try {
            $stmt = $this->p->query("SELECT sum(cont) AS cont FROM `visita` WHERE MONTH(data) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)");

            $c = 0;
            foreach ($stmt as $row) {
                $c = $row['cont'];
            }

            return $c;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
    
    public function getCountViewActualMonth() {
        try {
            $stmt = $this->p->query("SELECT sum(cont) AS cont FROM `visita` WHERE MONTH(data) = MONTH(CURRENT_DATE)");

            $c = 0;
            foreach ($stmt as $row) {
                $c = $row['cont'];
            }

            return $c;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

}

?>