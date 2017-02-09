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

            if ($_POST['inputsenha'] !== $_POST['inputconfirmasenha']) {
                echo "Error|Senhas não conferem.";
                exit;
            }

            $a = new Autor();
            $adao = new AutorDao();

            $idautor = null;
            $imagem = "";
            $nome = $_POST['inputnome'];
            $email = $_POST['inputemail'];
            $senha = $_POST['inputsenha'];
            $perfil = "";
            $facebook_id = null;
            $estado = 0;

            $a->setAllAtributes($idautor, $imagem, $nome, $email, $senha, $perfil, $facebook_id, $estado);
            $rs = $adao->inserirAutor($a);

            if ($rs > 0) {
                echo "OK|Inserido com sucesso!";
            }
            break;
        default :
            echo "Deveu Papudo!";
    }
} else {
    echo "Deveu Papudo!";
}
?>