<?php

// INCLUDES
function __autoload($nomeClasse) {
    if (file_exists("../../entidade/" . $nomeClasse . ".class.php")) {
        include_once "../../entidade/" . $nomeClasse . ".class.php";
    }
    if (file_exists("../../dao/" . $nomeClasse . ".class.php")) {
        include_once "../../dao/" . $nomeClasse . ".class.php";
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

        if (copy($temp_name, "../../assets/images/ban_posts/" . $name)) {
            return $name;
        }
    } else {
        return "ERROR, ao copiar imagem.";
    }
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "addPost":
            if ($_FILES["inputimg"]["name"] !== "" && isset($_FILES)) {
                $nomeimg = salvaImagem($_FILES["inputimg"]);

                if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                    $nomeimg = "";
                }
            } else {
                $nomeimg = "";
            }

            $p = new Post();
            $pdao = new PostDao();

            $idpost = NULL;
            $idautor = $_POST['inputidautor'];
            $link = $_POST['inputlink'];
            $tags = $_POST['inputtags'];
            $imagem = $nomeimg;
            $titulo = $_POST['inputtitulo'];
            $datahora = date("Y-m-d H:i:s");
            $resumo = $_POST['inputresumo'];
            $materia = $_POST['inputCont'];
            $estado = $_POST['inputestado'];
            $comentario = $_POST['inputcomentario'];
            $aberto = 0;

            $p->setAllAtributes($idpost, $idautor, $link, $tags, $imagem, $titulo, $datahora, $resumo, $materia, $estado, $comentario, $aberto);

            $idpost = $pdao->inserirPost($p);

            if ($idpost > 0) {
                //vincula a categoria
                $idcategoria = $_POST['selectCategoria'];

                $pdao = new PostDao();
                $rs = $pdao->inserirCategoria($idpost, $idcategoria);

                if ($rs > 0) {
                    echo "OK|Rascunho salvo com sucesso!|" . $idpost;
                }
            }

            break;
        case "editPost":
            $idpost = $_POST['inputid'];

            $p = new Post();
            $pdao = new PostDao();

            $p = $pdao->getPost($idpost);

            //adiciono nova imagem
            if ($_POST['inputeditimg'] === 'S') {

                //se tiver imagem antiga salva remove!
                if (!is_null($p->getImagem()) && file_exists("../../../assets/images/ban_posts/" . $p->getImagem())) {
                    //remove imagem antiga
                    unlink("../../../assets/images/ban_posts/" . $p->getImagem());
                } else {
                    //existir imagem nova salva!
                    if ($_FILES["inputimg"]["name"] !== "" && isset($_FILES)) {
                        $nomeimg = salvaImagem($_FILES["inputimg"]);

                        if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                            $nomeimg = "";
                        }
                    } else {
                        $nomeimg = "";
                    }
                }
            } else {
                $nomeimg = $p->getImagem();
            }

            $p = new Post();
            $pdao = new PostDao();


            $idautor = $_POST['inputidautor'];
            $link = $_POST['inputlink'];
            $tags = $_POST['inputtags'];
            $imagem = $nomeimg;
            $titulo = $_POST['inputtitulo'];
            $datahora = date("Y-m-d H:i:s");
            $resumo = $_POST['inputresumo'];
            $materia = $_POST['inputCont'];
            $estado = $_POST['inputestado'];
            $comentario = $_POST['inputcomentario'];
            $aberto = null;

            $p->setAllAtributes($idpost, $idautor, $link, $tags, $imagem, $titulo, $datahora, $resumo, $materia, $estado, $comentario, $aberto);

            if ($pdao->alterarPost($p) > 0) {
                //desvincula categoria
                $pdao = new PostDao();
                $pdao->removerCategoriaPost($idpost);

                //vincula a nova categoria
                $idcategoria = $_POST['selectCategoria'];

                $pdao = new PostDao();
                $rs = $pdao->inserirCategoria($idpost, $idcategoria);

                echo "OK|Alterado com sucesso!";
            }
            break;
        case "removePost":
            $id = $_POST['id'];

            $p = new Post();
            $pdao = new PostDao();

            $p = $pdao->getPost($id);

            $pdao = new PostDao();
            if ($pdao->removerPost($id)) {

                //remover imagem
                if ($p->getImagem() != "") {
                    unlink("../../../assets/images/ban_posts/" . $p->getImagem());
                }

                echo "OK|";
            }
            break;

        case "newauthor":

            $email = $_POST['inputemail'];

            $adao = new AutorDao();
            $a = new Autor();
            $a = $adao->getAutorByEmail($email);

            if ($a->getIdautor() > 0) {
                echo "CAD|Autor já cadastrado.";
                exit;
            }

            $idautor = null;
            $imagem = "";
            $nome = $_POST['inputname'];
            $senha = substr($email, 0, 2) . substr($_POST['inputfacebook_id'], 0, 6);
            $perfil = $_POST['inputperfil'];
            $facebook_id = $_POST['inputfacebook_id'];
            $estado = 1;

            $a->setAllAtributes($idautor, $imagem, $nome, $email, $senha, $perfil, $facebook_id, $estado);

            $adao = new AutorDao();
            $rs = $adao->inserirAutor($a);
            if ($rs > 0) {
                session_start();
                $_SESSION['autentication'] = "1";
                $_SESSION['email'] = $email;

                echo "OK|Inserido com sucesso!";
            }
            break;
        case "loginautoremail":
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $adao = new AutorDao();
            if ($adao->verificaLogin($email, $senha) > 0) {
                session_start();
                $_SESSION['autentication'] = "1";
                $_SESSION['email'] = $email;

                echo "OK|";
            } else {
                echo "ERROR|Email ou senha inválidas!";
            }

            break;
        case "loginauthorfacebook":

            $id = $_POST['inputfacebook_id'];
            $nome = $_POST['inputname'];
            $email = $_POST['inputemail'];

            $senha = substr($email, 0, 2) . substr($id, 0, 6);

            $adao = new AutorDao();
            if ($adao->verificaLogin($email, $senha) > 0) {
                session_start();
                $_SESSION['autentication'] = "1";
                $_SESSION['email'] = $email;

                echo "OK|";
            } else {
                echo "ERROR|Usuário inválido!";
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
            $facebook_id = $_POST['inputfacebook_id'];
            $estado = $_POST['inputestado'];

            $a->setAllAtributes($idautor, $imagem, $nome, $perfil, $facebook_id, $estado);
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
                if ($a->getImagem() != "") {
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

            echo "OK|" . $a->getIdautor() . "|" . $a->getImagem() . "|" . $a->getNome() . "|" . $a->getPerfil() . "|" . $a->getFacebook_id() . "|" . $a->getEstado();
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