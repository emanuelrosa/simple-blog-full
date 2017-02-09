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

    public function addsocial() {
        try {
            $stmt = $this->p->prepare("INSERT INTO `social` (`idsocial`, `facebook`, `twitter`, `whatsapp`, `youtube`, `instagram`, `google`, `pinterest`) VALUES ('', NULL, NULL, NULL, NULL, NULL, NULL, NULL);");

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function editSocial(Social $s) {
        try {
            $stmt = $this->p->prepare("UPDATE `social` SET `facebook` = ?, 
                `twitter` = ?, `whatsapp` = ?,  `youtube` = ?, 
                `instagram` = ?, `google` = ?, `pinterest` = ? WHERE `idsocial` = ?");
            $stmt->bindValue(1, $s->getFacebook());
            $stmt->bindValue(2, $s->getTwitter());
            $stmt->bindValue(3, $s->getWhatsapp());
            $stmt->bindValue(4, $s->getYoutube());
            $stmt->bindValue(5, $s->getInstagram());
            $stmt->bindValue(6, $s->getGoogle());
            $stmt->bindValue(7, $s->getPinterest());
            $stmt->bindValue(8, $s->getIdsocial());

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
                $s->setAlConstruct($row['idsocial'], $row['facebook'], $row['twitter'], $row['whatsapp'], $row['youtube'], $row['instagram'], $row['google'], $row['pinterest']);
            }

            $this->p = null;

            return $s;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
