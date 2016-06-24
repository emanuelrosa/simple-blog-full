<?php

/**
 * Description of MensagemDao
 *
 * @author CelsoPC
 */
class MensagemDao {

    private $p = null;

    function __construct() {
        $this->p = new Conexao();
    }

    function inserirMesagem(Mensagem $me) {
        try {
            $stmt = $this->p->prepare("INSERT INTO `mensagem` (`idmensagem`,"
                    . " `datahora`, `nome`, `email`, `mensagem`, `tipo`, `estado`, visto) "
                    . "VALUES ( NULL, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $me->getDatahora());
            $stmt->bindValue(2, $me->getNome());
            $stmt->bindValue(3, $me->getEmail());
            $stmt->bindValue(4, $me->getMensagem());
            $stmt->bindValue(5, $me->getTipo());
            $stmt->bindValue(6, $me->getEstado());
            $stmt->bindValue(7, $me->getVisto());

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function alterarEstadoMensagem($estado, $id) {
        try {
            $stmt = $this->p->prepare("UPDATE `mensagem` "
                    . "SET `estado` = ? WHERE `idmensagem` = ?");
            $stmt->bindValue(1, $estado);
            $stmt->bindValue(2, $id);

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    function setMesagemErrorVistos() {
        try {
            $stmt = $this->p->query("UPDATE `mensagem` SET `visto` = 1 WHERE `tipo` = 'E' ");

            $this->p = null;

            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    function setMesagemSiteVistos() {
        try {
            $stmt = $this->p->query("UPDATE `mensagem` SET `estado` = 1, `visto` = 1 WHERE `tipo` = 'S' ");

            $this->p = null;

            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    function removeMensagem($id) {
        try {
            $stmt = $this->p->prepare("DELETE FROM `mensagem` WHERE `idmensagem` = ?");
            $stmt->bindValue(1, $id);
            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listMensagemErro() {
        try {
            $stmt = $this->p->query("SELECT * FROM `mensagem` WHERE `tipo` = 'E' ORDER BY `datahora` DESC");
            $this->p = null;
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listTodasMensagemSite() {
        try {
            $stmt = $this->p->query("SELECT * FROM `mensagem` WHERE `tipo` = 'S' ORDER BY `datahora` DESC");
            $this->p = null;
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function listMensagemSiteNovas() {
        try {
            $stmt = $this->p->query("SELECT * FROM `mensagem` WHERE `tipo` = 'S' AND (`visto`IS NULL OR `visto` = 0) ORDER BY `datahora` DESC LIMIT 0 , 5");
            $this->p = null;
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    function listMensagemSiteError() {
        try {
            $stmt = $this->p->query("SELECT * FROM `mensagem` WHERE `tipo` = 'E' AND (`visto`IS NULL OR `visto` = 0) ORDER BY `datahora` DESC LIMIT 0 , 5");
            $this->p = null;
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listMensagemErroAberto() {
        try {
            $stmt = $this->p->query("SELECT * FROM `mensagem` WHERE `tipo` = 'E' AND `estado` = '0' ORDER BY `datahora` DESC");
            $this->p = null;
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listMensagemErroResolvido() {
        try {
            $stmt = $this->p->query("SELECT * FROM `mensagem` WHERE `tipo` = 'E' AND `estado` = '1' ORDER BY `datahora` DESC");
            $this->p = null;
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getNewCountMensagemSite() {
        try {
            $stmt = $this->p->query("SELECT COUNT(idmensagem) as cont FROM `mensagem` WHERE `tipo` = 'S' AND (`visto` = '0' OR `visto` IS NULL) ORDER BY `datahora` DESC");

            $rs = 0;
            foreach ($stmt as $row) {
                $rs = $row['cont'];
            }

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function getNewCountMensagemError() {
        try {
            $stmt = $this->p->query("SELECT COUNT(idmensagem) as cont FROM `mensagem` WHERE `tipo` = 'E' AND (`visto` = '0' OR `visto` IS NULL) ORDER BY `datahora` DESC");

            $rs = 0;
            foreach ($stmt as $row) {
                $rs = $row['cont'];
            }

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
