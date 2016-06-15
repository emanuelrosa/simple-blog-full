<?php

// INCLUDES
function __autoload($nomeClasse) {
    if (file_exists("../../../entidade/" . $nomeClasse . ".class.php")) {
        include_once "../../../entidade/" . $nomeClasse . ".class.php";
    }
    if (file_exists("../../../dao/" . $nomeClasse . ".class.php")) {
        include_once "../../../dao/" . $nomeClasse . ".class.php";
    }
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "add":
            $cat = new Categoria();
            $cdao = new CategoriaDao();

            $idcategoria = NULL;
            $categoria_idcategoria = ($_POST['inputpai'] === 'NULL') ? null : $_POST['inputpai'];
            $nome = $_POST['inputnome'];
            $slug = $_POST['inputslug'];
            $descricao = $_POST['inputdescricao'];
            $estado = '0';

            $cat->setAllAtributes($idcategoria, $categoria_idcategoria, $nome, $slug, $descricao, $estado);
            $rs = $cdao->inserirCategoria($cat);

            if ($rs > 0) {
                echo "OK|Inserido com sucesso!";
            }
            break;
        case "edit":
            $cat = new Categoria();
            $cdao = new CategoriaDao();

            $idcategoria = $_POST['inputid'];
            $categoria_idcategoria = ($_POST['inputpai'] === 'NULL') ? null : $_POST['inputpai'];
            $nome = $_POST['inputnome'];
            $slug = $_POST['inputslug'];
            $descricao = $_POST['inputdescricao'];
            $estado = $_POST['inputestado'];

            $cat->setAllAtributes($idcategoria, $categoria_idcategoria, $nome, $slug, $descricao, $estado);
            $rs = $cdao->alterarCategoria($cat);

            if ($rs > 0) {
                echo "OK|Alterado com sucesso!";
            }
            break;
        case "remove":
            $id = $_POST['id'];

            $cdao = new CategoriaDao();
            if ($cdao->removeCategoria($id)) {
                echo "OK|" . $id;
            }
            break;
        case "loadCategoria":
            $idcategoria = $_POST['id'];

            $c = new Categoria();
            $cdao = new CategoriaDao();

            $c = $cdao->getCategoriaByidCategoria($idcategoria);

            echo "OK|" . $c->getCategoria_idcategoria() . "|" . $c->getNome() . "|" . $c->getSlug() . "|" . $c->getDescricao() . "|" . $c->getEstado();
            break;
        case "changeEstado":
            $idcategoria = $_POST['id'];

            $c = new Categoria();

            $cdao = new CategoriaDao();
            $c = $cdao->getCategoriaByidCategoria($idcategoria);

            if ($c->getEstado() === '0') {
                $c->setEstado(1);
            } else {
                $c->setEstado(0);
            }

            $cdao = new CategoriaDao();
            if ($cdao->alterarCategoria($c) > 0) {
                echo "OK|" . $c->getEstado() . "|Alterado com sucesso!";
            }

            break;
        default:
            break;
    }
}