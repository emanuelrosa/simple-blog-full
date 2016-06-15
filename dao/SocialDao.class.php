<?php

/**
 * Description of SocialDao
 *
 * @author CelsoPC
 */
class SocialDao {

    private $p = null;

    function __construct() {
        $this->p = new Conexao();
    }

    function editSocial(Social $s) {
        try {
            $stmt = $this->p->prepare("UPDATE `social` SET `instagram` = ?, "
                    . "`facebook` = ?, `google` = ?, `youtube` = ?, "
                    . "`pinterest` = ? WHERE `idsocial` = ?");
            $stmt->bindValue(1, $s->getInstagram());
            $stmt->bindValue(2, $s->getFacebook());
            $stmt->bindValue(3, $s->getGoogle());
            $stmt->bindValue(4, $s->getYoutube());
            $stmt->bindValue(5, $s->getPinterest());
            $stmt->bindValue(6, $s->getIdsocial());

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function getSocial() {
        try {
            $stmt = $this->p->query("SELECT * FROM `social`");

            $s = new Social();
            foreach ($stmt as $row) {
                $s->setAlConstruct($row['idsocial'], $row['instagram'], $row['facebook'], $row['google'], $row['youtube'], $row['pinterest']);
            }

            $this->p = null;

            return $s;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
