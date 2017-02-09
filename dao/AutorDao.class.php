<?php

class AutorDao {

    //irá receber a conexão;
    private $p = null;

    //construtor
    function __construct() {
        $this->p = new Conexao();
    }

    public function inserirAutor(Autor $a) {
        try {
            $stmt = $this->p->prepare("INSERT INTO `autor` (`idautor`, `imagem`, `nome`, `email`, `senha`, `perfil`, `facebook_id`, `estado`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $a->getImagem());
            $stmt->bindValue(2, $a->getNome());
            $stmt->bindValue(3, $a->getEmail());
            $stmt->bindValue(4, $a->getSenha());
            $stmt->bindValue(5, $a->getPerfil());
            $stmt->bindValue(6, $a->getFacebook_id());
            $stmt->bindValue(7, $a->getEstado());

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterarAutor(Autor $a) {
        try {
            $stmt = $this->p->prepare("UPDATE `autor` SET `imagem` = ? , `nome` = ?, `email` = ?, `senha` = ?, `perfil` = ?, `facebook_id` = ?, `estado` = ? WHERE `idautor` = ?");
            $stmt->bindValue(1, $a->getImagem());
            $stmt->bindValue(2, $a->getNome());
            $stmt->bindValue(3, $a->getEmail());
            $stmt->bindValue(4, $a->getSenha());
            $stmt->bindValue(5, $a->getPerfil());
            $stmt->bindValue(6, $a->getFacebook_id());
            $stmt->bindValue(7, $a->getEstado());
            $stmt->bindValue(8, $a->getIdautor());

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function removerAutor($idautor) {
        try {
            $stmt = $this->p->prepare("DELETE FROM `autor` WHERE `idautor` = ?");
            $stmt->bindValue(1, $idautor);

            $rs = $stmt->execute();

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getAutorById($id) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `autor` WHERE `idautor` = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $a = new Autor();
            foreach ($stmt as $row) {
                $a->setAllAtributes($row['idautor'], $row['imagem'], $row['nome'], $row['email'], $row['senha'], $row['perfil'], $row['facebook_id'], $row['estado']);
            }

            $this->p = null;

            return $a;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getAutorByEmail($email) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `autor` WHERE `email` = ?");
            $stmt->bindValue(1, $email);
            $stmt->execute();

            $a = new Autor();
            foreach ($stmt as $row) {
                $a->setAllAtributes($row['idautor'], $row['imagem'], $row['nome'], $row['email'], $row['senha'], $row['perfil'], $row['facebook_id'], $row['estado']);
            }

            $this->p = null;

            return $a;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listAllAutor() {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `autor`");
            $stmt->execute();

            $this->p = null;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listAllAutorActives() {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `autor` WHERE `estado` = 1");
            $stmt->execute();

            $this->p = null;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function verificaLogin($email, $senha) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `autor` WHERE `email` = ? and `senha` = ?");
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);

            $stmt->execute();

            $rs = 0;
            foreach ($stmt as $row) {
                $rs = $row['idautor'];
            }

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}

?>