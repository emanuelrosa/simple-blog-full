<?php

/**
 * Description of ConfigDao
 *
 * @author CelsoPC
 */
class ConfigDao {

    //put your code here
    private $p = null;

    function __construct() {
        $this->p = new Conexao();
    }

    function getConfig() {
        try {
            $stmt = $this->p->query("SELECT * FROM `config`");
            $c = new Config();
            foreach ($stmt as $row) {
                $c->setAllAtributes($row['idconfig'], $row['gifload'], $row['imglogo'], $row['imgtopo'], $row['imgsocial'], $row['imglogoadm'], $row['titulo'], $row['descricao'], $row['autor'], $row['header'], $row['body'], $row['palavra_chave'], $row['appid_facebook'], $row['num_comentarios_visivel'], $row['facebook_id']);
            }

            $this->p = null;

            return $c;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function addconfig() {
        try {
            $stmt = $this->p->prepare("INSERT INTO `config` (`idconfig`, `gifload`, `imglogo`, `imgtopo`, `imgsocial`, `imglogoadm`, `titulo`, `descricao`, `autor`, `header`, `body`, `palavra_chave`, `appid_facebook`, `num_comentarios_visivel`, `facebook_id`) VALUES ('', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)");

            $stmt->execute();
            $this->p = null;

            return $stmt->rowCount();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editInformcoesGeraisConfig(Config $c) {
        try {
            $stmt = $this->p->prepare("UPDATE `config` SET `titulo` = ?,
                `autor` = ?, `palavra_chave` = ?, `descricao` = ? 
                WHERE `idconfig` = ?");
            $stmt->bindValue(1, $c->getTitulo());
            $stmt->bindValue(2, $c->getAutor());
            $stmt->bindValue(3, $c->getPalavra_chave());
            $stmt->bindValue(4, $c->getDescricao());
            $stmt->bindValue(5, $c->getIdconfig());

            $rs = $stmt->execute();
            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editIntegracaoConfig(Config $c) {
        try {
            $stmt = $this->p->prepare("UPDATE `config` SET `header` = ?,
                `body` = ? WHERE `idconfig` = ?");
            $stmt->bindValue(1, $c->getHeader());
            $stmt->bindValue(2, $c->getBody());
            $stmt->bindValue(3, $c->getIdconfig());

            $rs = $stmt->execute();
            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editLogoSiteConfig(Config $c) {
        try {
            $stmt = $this->p->prepare("UPDATE `config` SET `imglogo` = ?
                WHERE `idconfig` = ?");
            $stmt->bindValue(1, $c->getImglogo());
            $stmt->bindValue(2, $c->getIdconfig());

            $rs = $stmt->execute();
            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editTopoConfig(Config $c) {
        try {
            $stmt = $this->p->prepare("UPDATE `config` SET `imgtopo` = ?
                WHERE `idconfig` = ?");
            $stmt->bindValue(1, $c->getImgtopo());
            $stmt->bindValue(2, $c->getIdconfig());

            $rs = $stmt->execute();
            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editLogoPainelAdminConfig(Config $c) {
        try {
            $stmt = $this->p->prepare("UPDATE `config` SET `imglogoadm` = ?
                WHERE `idconfig` = ?");
            $stmt->bindValue(1, $c->getImglogoadmin());
            $stmt->bindValue(2, $c->getIdconfig());

            $rs = $stmt->execute();
            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editBannerSiteConfig(Config $c) {
        try {
            $stmt = $this->p->prepare("UPDATE `config` SET `imgsocial` = ?
                WHERE `idconfig` = ?");
            $stmt->bindValue(1, $c->getImgsocial());
            $stmt->bindValue(2, $c->getIdconfig());

            $rs = $stmt->execute();
            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editLoadGifConfig(Config $c) {
        try {
            $stmt = $this->p->prepare("UPDATE `config` SET `gifload` = ?
                WHERE `idconfig` = ?");
            $stmt->bindValue(1, $c->getGifload());
            $stmt->bindValue(2, $c->getIdconfig());

            $rs = $stmt->execute();
            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function editConfigComentarioFacebookConfig(Config $c) {
        try {
            $stmt = $this->p->prepare("UPDATE `config` SET `appid_facebook` = ?,
                `num_comentarios_visivel` = ?, `facebook_id` = ? WHERE `idconfig` = ?");
            $stmt->bindValue(1, $c->getAppid_facebook());
            $stmt->bindValue(2, $c->getNum_comentarios_visivel());
            $stmt->bindValue(3, $c->getFacebook_id());
            $stmt->bindValue(4, $c->getIdconfig());

            $rs = $stmt->execute();
            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
