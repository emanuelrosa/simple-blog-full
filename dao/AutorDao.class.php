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
            $stmt = $this->p->prepare("INSERT INTO `autor` (`idautor`, `imagem`, `nome`, `perfil`, `estado`) VALUES (NULL, ?, ?, ?, ?)");
            $stmt->bindValue(1, $a->getImagem());
            $stmt->bindValue(2, $a->getNome());
            $stmt->bindValue(3, $a->getPerfil());
            $stmt->bindValue(4, $a->getEstado());

            $rs = $stmt->execute();

            $this->p = null;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterarAutor(Autor $a) {
        try {
            $stmt = $this->p->prepare("UPDATE `autor` SET `imagem` = ? , `nome` = ?, `perfil` = ?, `estado` = ? WHERE `idautor` = ?");
            $stmt->bindValue(1, $a->getImagem());
            $stmt->bindValue(2, $a->getNome());
            $stmt->bindValue(3, $a->getPerfil());
            $stmt->bindValue(4, $a->getEstado());
            $stmt->bindValue(5, $a->getIdautor());

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
                $a->setAllAtributes($row['idautor'], $row['imagem'], $row['nome'], $row['perfil'], $row['estado']);
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

}

?>