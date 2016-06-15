<?php

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
        case "about":
            $inst = new Institucional();

            $idinstitucional = $_POST['inputid'];
            $area = 'sobre';
            $texto = $_POST['inputCont'];
            $estado = $_POST['inputestado'];

            $inst->setAllAtributes($idinstitucional, $area, $texto, $estado);

            $idao = new InstitucionalDao();
            if ($idao->editInstitucional($inst) > 0) {
                echo "OK|Texto atualizado com sucesso!";
            } else {
                echo "Error|Não foi possível fazer as alterações.";
            }

            break;
        case "terms":
            $inst = new Institucional();

            $idinstitucional = $_POST['inputid'];
            $area = 'termouso';
            $texto = $_POST['inputCont'];
            $estado = $_POST['inputestado'];

            $inst->setAllAtributes($idinstitucional, $area, $texto, $estado);

            $idao = new InstitucionalDao();
            if ($idao->editInstitucional($inst) > 0) {
                echo "OK|Texto atualizado com sucesso!";
            } else {
                echo "Error|Não foi possível fazer as alterações.";
            }
            break;
        case "privacy":
            $inst = new Institucional();

            $idinstitucional = $_POST['inputid'];
            $area = 'privacidade';
            $texto = $_POST['inputCont'];
            $estado = $_POST['inputestado'];

            $inst->setAllAtributes($idinstitucional, $area, $texto, $estado);

            $idao = new InstitucionalDao();
            if ($idao->editInstitucional($inst) > 0) {
                echo "OK|Texto atualizado com sucesso!";
            } else {
                echo "Error|Não foi possível fazer as alterações.";
            }

            break;
        case "social":
            $s = new Social();

            $idsocial = $_POST['inputid'];
            $instagram = $_POST['inputistagram'];
            $facebook = $_POST['inputfacebook'];
            $google = $_POST['inputgoogle'];
            $youtube = $_POST['inputgoogle'];
            $pinterest = $_POST['inputpinterest'];

            $s->setAlConstruct($idsocial, $instagram, $facebook, $google, $youtube, $pinterest);

            $sdao = new SocialDao();
            if ($sdao->editSocial($s) > 0) {
                echo "OK|Redes sociais atualizads com sucesso!";
            } else {
                echo "Error|Não foi possível fazer as alterações.";
            }

            break;
        case "editmsgerror":
            $id = $_POST['id'];

            $mdao = new MensagemDao();
            if ($mdao->alterarEstadoMensagem("1", $id) > 0) {
                echo "OK|Mensagem alterada com sucesso!";
            } else {
                echo "Error|Mensagem não pode ser alterada tente mais tarde! Caso esta mensagem persista informe o administrativo.";
            }

            break;
        case "removemsgerror":
            $id = $_POST['id'];

            $mdao = new MensagemDao();
            if ($mdao->removeMensagem($id) > 0) {
                echo "OK|Mensagem removida com sucesso!";
            } else {
                echo "Error|Mensagem não pode ser removida tente mais tarde! Caso esta mensagem persista informe o administrativo.";
            }
            break;
        default :
            echo "Deveu papudooooo";
    }
} else {
    echo "Deveu papudo!";
}
?>

