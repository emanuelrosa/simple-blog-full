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

function renomear() {
    $string = rand(0, 999999999);
    return $string;
}

function salvaImagem($file) {
    $temp_name = $file['tmp_name'];
    $formato = split("/", $file['type']);

    $name = renomear() . "." . $formato[1];
    //verifica formato 
    //adicionado formato de edicao iphone .aae !!!nao funcionou!!!!
    if ($formato[1] === "png" || $formato[1] === "gif" || $formato[1] === "jpg" || $formato[1] === "jpeg" || $formato[1] === "tiff" || $formato[1] === "aae") {

        if (copy($temp_name, "../../../assets/images/authors/" . $name)) {
            return $name;
        }
    } else {
        return "ERROR";
    }
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "add":
            if ($_FILES["inputimg"]["name"] !== "" && isset($_FILES)) {
                $nomeimg = salvaImagem($_FILES["inputimg"]);

                if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                    $nomeimg = "";
                }
            } else {
                $nomeimg = "";
            }
                    
            $a = new Autor();
            $adao = new AutorDao();

            $idautor = null;
            $imagem = $nomeimg;
            $nome = $_POST['inputnome'];
            $perfil = $_POST['inputperfil'];
            $estado = 0;

            $a->setAllAtributes($idautor, $imagem, $nome, $perfil, $estado);
            $rs = $adao->inserirAutor($a);

            if ($rs > 0) {
                echo "OK|Inserido com sucesso!";
            }
            break;
        case "edit":
            if ($_FILES["inputimg"]["name"] !== "" && isset($_FILES)) {
                $nomeimg = salvaImagem($_FILES["inputimg"]);

                if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                    $nomeimg = "";
                }
            } else {
                $nomeimg = "";
            }
                    
            $a = new Autor();
            $adao = new AutorDao();

            $idautor = $_POST['inputid'];
            $imagem = $nomeimg;
            $nome = $_POST['inputnome'];
            $perfil = $_POST['inputperfil'];
            $estado = $_POST['inputestado'];

            $a->setAllAtributes($idautor, $imagem, $nome, $perfil, $estado);
            $rs = $adao->alterarAutor($a);

            if ($rs > 0) {
                echo "OK|Alterado com sucesso!";
            }
            break;
        case "remove":
            $id = $_POST['id'];
            
            $a = new Autor();
            $adao = new AutorDao();

            $a = $adao->getAutorById($id);

            $adao = new AutorDao();
            if ($adao->removerAutor($id)) {
                
                //remover imagem
                if($a->getImagem() != ""){
                    unlink("../../../assets/images/authors/" . $a->getImagem());
                }
                
                echo "OK|";
            }
            break;
        case "loadAutor":
            $idautor = $_POST['id'];

            $a = new Autor();
            $adao = new AutorDao();

            $a = $adao->getAutorById($idautor);

            echo "OK|" . $a->getIdautor() . "|" . $a->getImagem() . "|" . $a->getNome() . "|" . $a->getPerfil() . "|" . $a->getEstado();
            break;
        case "changeEstado":
            $idautor = $_POST['id'];

            $a = new Autor();

            $adao = new AutorDao();
            $a = $adao->getAutorById($idautor);

            if ($a->getEstado() === '0') {
                $a->setEstado(1);
            } else {
                $a->setEstado(0);
            }

            $adao = new AutorDao();
            if ($adao->alterarAutor($a) > 0) {
                echo "OK|" . $a->getEstado() . "|Alterado com sucesso!";
            }

            break;
        default:
            break;
    }
} else {
    echo "Deveu Papudo!";
}