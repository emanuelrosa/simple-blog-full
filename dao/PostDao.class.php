<?php

/**
 * Description of Post
 *
 * @author CelsoPC
 */
class PostDao {

    private $p = null;

    function __construct() {
        $this->p = new Conexao();
    }

    function getNextId() {
        try {
            $this->p = new Conexao();

            $stmt = $this->p->query('SELECT MAX(`idpost`) AS `idpost` FROM `post`');
            $nextid = null;
            foreach ($stmt as $row) {
                $nextid = $row['idpost'] + 1;
            }

            return $nextid;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function inserirPost(Post $post) {
        try {
            $id = $this->getNextId();

            $stmt = $this->p->prepare("INSERT INTO `post` (`idpost`, "
                    . "`autor_idautor`, `link`, `tags`, `imagem`, `titulo`, "
                    . "`datahora`, `resumo`, `materia`, `estado`, `comentario`, `aberto`, `agendado`) "
                    . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?);");
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $post->getIdautor());
            $stmt->bindValue(3, $post->getLink());
            $stmt->bindValue(4, $post->getTags());
            $stmt->bindValue(5, $post->getImagem());
            $stmt->bindValue(6, $post->getTitulo());
            $stmt->bindValue(7, $post->getDatahora());
            $stmt->bindValue(8, $post->getResumo());
            $stmt->bindValue(9, $post->getMateria());
            $stmt->bindValue(10, $post->getEstado());
            $stmt->bindValue(11, $post->getComentario());
            $stmt->bindValue(12, $post->getAgendado());

            $rs = $stmt->execute();

            $this->p = NULL;

            return $id;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function inserirCategoria($idpost, $idcategoria) {
        try {
            $stmt = $this->p->prepare("INSERT INTO `post_has_categoria` "
                    . "(`post_idpost`, `categoria_idcategoria`) "
                    . "VALUES (?, ?);");
            $stmt->bindValue(1, $idpost);
            $stmt->bindValue(2, $idcategoria);

            $rs = $stmt->execute();

            $this->p = NULL;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function alterarPost(Post $post) {
        try {
            $stmt = $this->p->prepare("UPDATE `post` SET `link` = ?, `tags` = ?, "
                    . "`imagem` = ?, `titulo` = ?, `resumo` = ?, `materia` = ?, "
                    . "`estado` = ?, `comentario` = ?, `agendado` = ? WHERE `idpost` = ?;");
            $stmt->bindValue(1, $post->getLink());
            $stmt->bindValue(2, $post->getTags());
            $stmt->bindValue(3, $post->getImagem());
            $stmt->bindValue(4, $post->getTitulo());
            $stmt->bindValue(5, $post->getResumo());
            $stmt->bindValue(6, $post->getMateria());
            $stmt->bindValue(7, $post->getEstado());
            $stmt->bindValue(8, $post->getComentario());
            $stmt->bindValue(9, $post->getAgendado());
            $stmt->bindValue(10, $post->getIdpost());

            $rs = $stmt->execute();

            $this->p = NULL;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function getPost($idpost) {
        try {
            $stmt = $this->p->prepare("SELECT P.*, C.`idcategoria`, C.`nome` AS `cnome` FROM `post` P "
                    . "LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor` "
                    . "LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` "
                    . "LEFT JOIN `categoria` C ON PC.`categoria_idcategoria` = C.`idcategoria` WHERE `idpost` = ?");
            $stmt->bindValue(1, $idpost);

            $stmt->execute();

            $post = new Post();
            foreach ($stmt as $row) {
                $idpost = $row['idpost'];
                $idautor = $row['autor_idautor'];
                $link = $row['link'];
                $tags = $row['tags'];
                $imagem = $row['imagem'];
                $titulo = $row['titulo'];
                $datahora = $row['datahora'];
                $resumo = $row['resumo'];
                $materia = $row['materia'];
                $estado = $row['estado'];
                $comentario = $row['comentario'];
                $aberto = $row['aberto'];

                $post->setAllAtributes($idpost, $idautor, $link, $tags, $imagem, $titulo, $datahora, $resumo, $materia, $estado, $comentario, $aberto);

                $post->setAgendado($row['agendado']);
                
                $post->setIdcategoria($row['idcategoria']);
                $post->setCategoria($row['cnome']);
            }

            $this->p = NULL;

            return $post;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function getPostByLink($link) {
        try {
            $stmt = $this->p->prepare("SELECT P.*, C.`idcategoria`, C.`nome` AS `cnome`, "
                    . "A.`nome` AS `nomeautor` FROM `post` P "
                    . "LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor` "
                    . "LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` "
                    . "LEFT JOIN `categoria` C ON PC.`categoria_idcategoria` = C.`idcategoria` WHERE `link` LIKE ?");
            $stmt->bindValue(1, $link);

            $stmt->execute();

            $post = new Post();
            foreach ($stmt as $row) {
                $idpost = $row['idpost'];
                $idautor = $row['autor_idautor'];
                $link = $row['link'];
                $tags = $row['tags'];
                $imagem = $row['imagem'];
                $titulo = $row['titulo'];
                $datahora = $row['datahora'];
                $resumo = $row['resumo'];
                $materia = $row['materia'];
                $estado = $row['estado'];
                $comentario = $row['comentario'];
                $aberto = $row['aberto'];

                $post->setAllAtributes($idpost, $idautor, $link, $tags, $imagem, $titulo, $datahora, $resumo, $materia, $estado, $comentario, $aberto);

                $post->setCategoria($row['cnome']);
                $post->setNomeautor($row['nomeautor']);
            }

            $this->p = NULL;

            return $post;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function removerPost($idpost) {
        try {
            $stmt = $this->p->prepare("DELETE FROM `post` WHERE `idpost` = ?");
            $stmt->bindValue(1, $idpost);

            $rs = $stmt->execute();

            $this->p = NULL;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function removerCategoriaPost($idpost) {
        try {
            $stmt = $this->p->prepare("DELETE FROM `post_has_categoria` WHERE `post_idpost` = ?");
            $stmt->bindValue(1, $idpost);

            $rs = $stmt->execute();

            $this->p = NULL;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listAllPost() {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.agendado, P.link,"
                    . "P.`estado`, A.`nome` as `nomeautor`, C.`nome` AS `nomecategoria` FROM `post` P "
                    . "LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` "
                    . "LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` "
                    . "LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor` "
                    . "ORDER BY `datahora` DESC");
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function listAllPostByAuthor($idautor) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`link`,"
                    . "P.`estado`, A.`nome` as `nomeautor`, C.`nome` AS `nomecategoria` FROM `post` P "
                    . "LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` "
                    . "LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` "
                    . "LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor` "
                    . "WHERE P.`autor_idautor` = ? "
                    . "ORDER BY `datahora` DESC");
            $stmt->bindValue(1, $idautor);
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listAllPostActive() {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`imagem`,  P.agendado, 
                P.`link`, P.`tags`, P.`estado`, P.`resumo`,  A.`nome` as `nomeautor`,  P.link,
                C.`nome` AS `nomecategoria` FROM `post` P 
                LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` 
                LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` 
                LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`
                WHERE P.`estado` = 1 ORDER BY datahora DESC");
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function listAllPostActiveByAuthor($idautor) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`imagem`, 
                P.`link`, P.`tags`, P.`estado`, P.`resumo`,  A.`nome` as `nomeautor`, P.`aberto`,
                C.`nome` AS `nomecategoria` FROM `post` P 
                LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` 
                LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` 
                LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`
                WHERE P.`autor_idautor` = ? AND P.`estado` = 1 ORDER BY datahora DESC");
            $stmt->bindValue(1, $idautor);
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listAllPostSearchActive($search) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`imagem`, 
                P.`link`, P.`tags`, P.`estado`, P.`resumo`,  A.`nome` as `nomeautor`, 
                C.`nome` AS `nomecategoria` FROM `post` P 
                LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` 
                LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` 
                LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`
                WHERE (P.`titulo` LIKE ? || P.`resumo` LIKE ? || P.`tags` LIKE ? ) AND 
                P.`estado` = 1 ORDER BY datahora DESC");
            $stmt->bindValue(1, "%%" . $search . "%%");
            $stmt->bindValue(2, "%%" . $search . "%%");
            $stmt->bindValue(3, "%%" . $search . "%%");

            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listAllPostActiveLimit($inicio) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`imagem`, 
                P.`link`, P.`tags`, P.`estado`, P.`resumo`, P.`aberto`,  A.`nome` as `nomeautor`, 
                C.`nome` AS `nomecategoria` FROM `post` P 
                LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` 
                LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` 
                LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`
                WHERE P.`estado` = 1 ORDER BY datahora DESC LIMIT $inicio, 5");
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function listAllPostSearchActiveLimit($search, $inicio) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`imagem`, 
                P.`link`, P.`tags`, P.`estado`, P.`resumo`,  A.`nome` as `nomeautor`, 
                C.`nome` AS `nomecategoria` FROM `post` P 
                LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` 
                LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` 
                LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`
                WHERE (P.`titulo` LIKE ? || P.`resumo` LIKE ? || P.`tags` LIKE ? ) AND 
                P.`estado` = 1 ORDER BY datahora DESC LIMIT $inicio, 5");
            $stmt->bindValue(1, "%%" . $search . "%%");
            $stmt->bindValue(2, "%%" . $search . "%%");
            $stmt->bindValue(3, "%%" . $search . "%%");
            
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listLastFivePostActive() {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `post` P WHERE P.`estado` = 1 ORDER BY P.`datahora` DESC LIMIT 0,5");
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listAllPostInative() {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.agendado, P.link, "
                    . "P.`estado`, A.`nome` as `nomeautor`, C.`nome` AS `nomecategoria` FROM `post` P "
                    . "LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` "
                    . "LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` "
                    . "LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`"
                    . "WHERE P.`estado` = 0");
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function listAllPostInativeByAuthor($idautor) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, "
                    . "P.`estado`, A.`nome` as `nomeautor`, C.`nome` AS `nomecategoria` FROM `post` P "
                    . "LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` "
                    . "LEFT JOIN `categoria` C ON C.`idcategoria` = PC.`categoria_idcategoria` "
                    . "LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`"
                    . "WHERE P.`autor_idautor` = ? AND P.`estado` = 2");
            $stmt->bindValue(1, $idautor);
            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function listAllPostActiveByCategory($idcategory) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`imagem`, 
                P.`link`, P.`tags`, P.`estado`, P.`resumo`, P.aberto,
                A.`nome` as `nomeautor`, C.`nome` AS `nomecategoria`  FROM `post` P 
                LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` 
                LEFT JOIN `categoria` C ON PC.`categoria_idcategoria` = C.`idcategoria` 
                LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`
                WHERE P.`estado` = 1 AND PC.`categoria_idcategoria` = ? ORDER BY `datahora` DESC");
            $stmt->bindValue(1, $idcategory);

            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    function listAllPostActiveByCategoryLimit($idcategory, $inicio = 0) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`imagem`, 
                P.`link`, P.`tags`, P.`estado`, P.`resumo`, P.aberto,
                A.`nome` as `nomeautor`, C.`nome` AS `nomecategoria`  FROM `post` P 
                LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` 
                LEFT JOIN `categoria` C ON PC.`categoria_idcategoria` = C.`idcategoria` 
                LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`
                WHERE P.`estado` = 1 AND PC.`categoria_idcategoria` = ? ORDER BY `datahora` DESC LIMIT $inicio , 5");
            $stmt->bindValue(1, $idcategory);

            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function findAllPostActiveSearch($search) {
        try {
            $stmt = $this->p->prepare("SELECT * FROM `post` P "
                    . "LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` "
                    . "LEFT JOIN `categoria` C ON PC.`categoria_idcategoria` = C.`idcategoria`"
                    . "WHERE `titulo` LIKE ? OR `resumo` = ?");
            $stmt->bindValue(1, "%%" . $search . "%%");
            $stmt->bindValue(2, "%%" . $search . "%%");

            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function getLastPostLink($idpost) {
        try {
            $stmt = $this->p->prepare("select idpost, link from post where idpost < ? AND estado = 1 ORDER BY idpost DESC LIMIT 1 ");
            $stmt->bindValue(1, $idpost);

            $stmt->execute();
            $last = "";
            foreach ($stmt as $row) {
                $last = $row['link'];
            }

            $stmt = $this->p->prepare("select idpost, link from post where idpost > ? AND estado = 1 ORDER BY idpost ASC LIMIT 1 ");
            $stmt->bindValue(1, $idpost);

            $stmt->execute();
            $next = "";
            foreach ($stmt as $row) {
                $next = $row['link'];
            }

            $this->p = NULL;

            return $last . "|" . $next;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function setView($idpost) {
        try {
            $stmt = $this->p->prepare("UPDATE `post` SET `aberto` = `aberto` + 1 WHERE `idpost` = ?;");
            $stmt->bindValue(1, $idpost);

            $rs = $stmt->execute();

            $this->p = NULL;

            return $rs;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listTopViews() {
        try {
            $stmt = $this->p->query("SELECT * FROM `post` P WHERE DATE(`datahora`) BETWEEN DATE_SUB( CURRENT_DATE( ) , INTERVAL 30 DAY ) AND current_date() AND `estado` = 1 ORDER BY `aberto` DESC LIMIT 0 , 5 ");
            $this->p = null;
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function listTopViewsByWeek() {
        try {
            $stmt = $this->p->query("SELECT `data`, url, SUM(cont) AS CONT FROM `visita` V  WHERE `data` BETWEEN DATE_SUB( CURRENT_DATE( ) , INTERVAL 7 DAY ) AND current_date() GROUP BY `url` ORDER BY cont DESC LIMIT 0,5");
            $this->p = null;
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listAllPostActiveByTags($tag) {
        try {
            $stmt = $this->p->prepare("SELECT P.`idpost`, P.`titulo`, P.`datahora`, P.`imagem`, 
                P.`link`, P.`tags`, P.`estado`, P.`resumo`, 
                A.`nome` as `nomeautor`, C.`nome` AS `nomecategoria`  FROM `post` P 
                LEFT JOIN `post_has_categoria` PC ON PC.`post_idpost` = P.`idpost` 
                LEFT JOIN `categoria` C ON PC.`categoria_idcategoria` = C.`idcategoria` 
                LEFT JOIN `autor` A ON P.`autor_idautor` = A.`idautor`
                WHERE P.`estado` = 1 AND P.`tags` LIKE ? ORDER BY `datahora` DESC");
            $stmt->bindValue(1, "%%" . $tag . "%%");

            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function activePosts($datahoraatual) {
        try {
            $stmt = $this->p->prepare("UPDATE `post` SET `datahora` = ?,`estado` = 1 WHERE `estado` = 0 AND `agendado` < ?");
            $stmt->bindValue(1, $datahoraatual);
            $stmt->bindValue(2, $datahoraatual);

            $stmt->execute();

            $this->p = NULL;

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
