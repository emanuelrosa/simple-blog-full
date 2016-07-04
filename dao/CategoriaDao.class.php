<?php

//include_once '../entidade/Categoria.class.php';
//include_once 'Conexao.class.php';

class CategoriaDao {

    // ira receber uma conexao
    private $p = null;

    // construtor
    public function CategoriaDao() {
        $this->p = new Conexao();
    }

    public function inserirCategoria(Categoria $categoria) {
        try {
            $stmt = $this->p->prepare("INSERT INTO `categoria` (`idcategoria`, `categoria_idcategoria`, `nome`, "
                    . "`slug`, `descricao`, `estado`) VALUES (NULL, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $categoria->getCategoria_idcategoria());
            $stmt->bindValue(2, $categoria->getNome());
            $stmt->bindValue(3, $categoria->getSlug());
            $stmt->bindValue(4, $categoria->getDescricao());
            $stmt->bindValue(5, $categoria->getEstado());

            //echo $categoria->getCategoria_idcategoria();
            // executo a query preparada
            $rs = $stmt->execute();

            // fecho a conexao
            $this->p = null;

            return $rs;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function alterarCategoria(Categoria $categoria) {
        try {
            $stmt = $this->p->prepare("UPDATE `categoria` SET `categoria_idcategoria` = ?, `nome` = ?, `slug` = ?, `descricao` = ?, `estado` = ? WHERE `idcategoria` = ? ");
            $this->p->beginTransaction();

            $stmt->bindValue(1, $categoria->getCategoria_idcategoria());
            $stmt->bindValue(2, $categoria->getNome());
            $stmt->bindValue(3, $categoria->getSlug());
            $stmt->bindValue(4, $categoria->getDescricao());
            $stmt->bindValue(5, $categoria->getEstado());
            $stmt->bindValue(6, $categoria->getIdcategoria());

            // executo a query preparada
            $stmt->execute();
            $this->p->commit();

            // fecho a conexao
            $this->p = null;
            return true;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function getCategoriaByidCategoria($idcategoria) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM categoria WHERE idcategoria = ?");
            $stmt->bindValue(1, $idcategoria);
            $stmt->execute();

            $categoria = new Categoria();
            foreach ($stmt as $row) {
                $categoria->setAllAtributes($row['idcategoria'], $row['categoria_idcategoria'], $row['nome'], $row['slug'], $row['descricao'], $row['estado']);
            }

            // fecho a conexao
            $this->p = null;

            //retorna categoria
            return $categoria;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function getCategoriaBySlug($slug) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `categoria` WHERE `slug` LIKE ?");
            $stmt->bindValue(1, $slug);
            $stmt->execute();

            $categoria = new Categoria();
            foreach ($stmt as $row) {
                $categoria->setAllAtributes($row['idcategoria'], $row['categoria_idcategoria'], $row['nome'], $row['slug'], $row['descricao'], $row['estado']);
            }

            // fecho a conexao
            $this->p = null;

            //retorna categoria
            return $categoria;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function removeCategoria($id) {
        try {
            $stmt = $this->p->prepare("DELETE FROM `categoria` WHERE `idcategoria` = ?");
            $stmt->bindValue(1, $id);

            // executo a query preparada
            $stmt->execute();

            // fecho a conexao
            $this->p = null;
            return true;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
            return false;
        }
    }

    public function listAllCategorias() {
        try {
            $stmt = $this->p->query("select *, 
                (select count(idpost) from post P 
                left join post_has_categoria PC on P.idpost = PC.post_idpost 
                where PC.categoria_idcategoria = C.idcategoria) as contpost 
                from categoria C;");

            // fecho a conexao
            $this->p = null;

            // retorna a lista
            return $stmt;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }
    
    public function listAllActivesCategorias() {
        try {
            $stmt = $this->p->query("SELECT * FROM `categoria` WHERE `estado` = 1");

            // fecho a conexao
            $this->p = null;

            // retorna a lista
            return $stmt;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function listCategorias() {
        try {
            $stmt = $this->p->query("SELECT * FROM `categoria` WHERE `categoria_idcategoria` IS NULL ORDER BY `nome` ASC");

            // fecho a conexao
            $this->p = null;

            // retorna a lista
            return $stmt;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function listActivesCategorias() {
        try {
            $stmt = $this->p->query("SELECT * FROM `categoria` WHERE `estado` = 1 AND `categoria_idcategoria` IS NULL ORDER BY `nome` ASC");

            // fecho a conexao
            $this->p = null;

            // retorna a lista
            return $stmt;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function listActivesSubcategorias($categoria_idcategoria) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `categoria` WHERE `estado` = 1 AND `categoria_idcategoria` = ? ORDER BY `nome` ASC");
            $stmt->bindValue(1, $categoria_idcategoria);

            $stmt->execute();
            // fecho a conexao
            $this->p = null;

            // retorna a lista
            return $stmt;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    public function listCategoriaContClassificado($idcategoria) {
        try {
            $stmt = $this->p->prepare("SELECT c.idcategoria, c.categoria_idcategoria, c.nome, count(cl.idclassificado) as qtd_classificado FROM `categoria` c 
                                        LEFT JOIN classificado cl on cl.categoria_idcategoria = c.idcategoria WHERE c.`categoria_idcategoria` = ? group by c.idcategoria order by c.nome");
            $stmt->bindValue(1, $idcategoria);

            $stmt->execute();
            // fecho a conexao
            $this->p = null;

            // retorna a lista
            return $stmt;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

}

?>
