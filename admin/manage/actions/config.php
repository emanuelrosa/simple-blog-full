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

        if (copy($temp_name, "../../../assets/images/config_img/" . $name)) {
            return $name;
        }
    } else {
        return "ERROR";
    }
}

function verConfig() {
    $conf = new Config();
    $cdao = new ConfigDao();
    $conf = $cdao->getConfig();
    if ($conf->getIdconfig() < 1) {
        $cdao = new ConfigDao();
        $cdao->addconfig();
    }
}

function verSocial() {
    $social = new Social();
    $cdao = new SocialDao();
    $social = $cdao->getSocial();
    if ($social->getIdsocial() < 1) {
        $sdao = new SocialDao();
        $sdao->addsocial();
    }
}

function verOption($option_nome) {
    $opdao = new OptionConfigDao();
    $rs = $opdao->verificaOptionConfig($option_nome);
    
    if ($rs < 1) {
        $op = new OptionConfig();
        $opdao = new OptionConfigDao();

        $op->setOption_nome($option_nome);
        $op->setAutoload('yes');

        $opdao->addOptionConfig($op);
    }
}

function editarOptionConfig($op) {
    $opdao = new OptionConfigDao();
    $opdao->editOptionConfig('siteurl',$op['siteurl']);

    $opdao = new OptionConfigDao();
    $opdao->editOptionConfig('anocriado',$op['anocriado']);
}

verConfig();
verSocial();

verOption("siteurl");
verOption("anocriado");


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "gerais":
            $c = new Config();
            $cdao = new ConfigDao();

            $c = $cdao->getConfig();

            $opdao = new OptionConfigDao();
            $op = $opdao->getOptionConfig();

            $op['siteurl'] = $_POST['inputurl'];
            $op['anocriado'] = $_POST['inputano'];

            $c->setTitulo($_POST['inputtitulo']);
            $c->setAutor($_POST['inputautor']);
            $c->setPalavra_chave($_POST['inputpalavraschave']);
            $c->setDescricao($_POST['inputdescricao']);

            $cdao = new ConfigDao();
            $rs = $cdao->editInformcoesGeraisConfig($c);
            if ($rs > 0) {
                editarOptionConfig($op);
                echo "OK|Informações gerais alteradas com sucesso!";
            }
            break;
        case "integracao":
            $c = new Config();
            $cdao = new ConfigDao();

            $c = $cdao->getConfig();

            $c->setHeader($_POST['inputheader']);
            $c->setBody($_POST['inputbody']);

            $cdao = new ConfigDao();
            $rs = $cdao->editIntegracaoConfig($c);
            if ($rs > 0) {
                echo "OK|Informações de integração alteradas com sucesso!";
            }
            break;
        case "social":
            $s = new Social();
            $sdao = new SocialDao();

            $s = $sdao->getSocial();

            $s->setFacebook($_POST['inputFacebook']);
            $s->setGoogle($_POST['inputGoogle']);
            $s->setInstagram($_POST['inputInstagram']);
            $s->setPinterest($_POST['inputPinterest']);
            $s->setTwitter($_POST['inputTwitter']);
            $s->setWhatsapp($_POST['inputWhatsapp']);
            $s->setYoutube($_POST['inputYoutube']);

            $sdao = new SocialDao();
            $rs = $sdao->editSocial($s);
            if ($rs > 0) {
                echo "OK|Informações de redes sociais alteradas com sucesso!";
            }
            break;
        case "configcomentario":
            $c = new Config();
            $cdao = new ConfigDao();

            $c = $cdao->getConfig();

            $c->setAppid_facebook($_POST['inputappid']);
            $c->setNum_comentarios_visivel($_POST['inputnumcomentario']);

            $cdao = new ConfigDao();
            $rs = $cdao->editConfigComentarioFacebookConfig($c);
            if ($rs > 0) {
                echo "OK|Informações de integração para comentários alteradas com sucesso!";
            }
            break;
        case "imglogo":
            if (file_exists($_FILES["inputimglogo"]["tmp_name"])) {
                list($width, $height, $type, $attr) = getimagesize($_FILES["inputimglogo"]["tmp_name"]);

                if ($width > 150 || $height > 55) {
                    echo "Error|Largura ou altura da imagem inválida!";
                    break;
                }
            }

            if ($_FILES["inputimglogo"]["name"] !== "" && isset($_FILES)) {
                $nomeimg = salvaImagem($_FILES["inputimglogo"]);

                if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                    $nomeimg = null;
                }
            } else {
                $nomeimg = null;
            }

            $c = new Config();
            $cdao = new ConfigDao();

            $c = $cdao->getConfig();

            // pagar antiga imagem
            if (!is_null($c->getImglogo())) {
                unlink("../../../assets/images/config_img/" . $c->getImglogo());
            }

            $c->setImglogo($nomeimg);

            $cdao = new ConfigDao();
            $rs = $cdao->editLogoSiteConfig($c);
            if ($rs > 0) {
                echo "OK|Logo do site alterado com sucesso!";
            }
            //echo "OK|retorno img";
            break;
        case "imgadm":
            if (file_exists($_FILES["inputimgadm"]["tmp_name"])) {
                list($width, $height, $type, $attr) = getimagesize($_FILES["inputimgadm"]["tmp_name"]);

                if ($width > 200 || $height > 36) {
                    echo "Error|Largura ou altura da imagem inválida!";
                    break;
                }
            }

            if ($_FILES["inputimgadm"]["name"] !== "" && isset($_FILES)) {
                $nomeimg = salvaImagem($_FILES["inputimgadm"]);

                if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                    $nomeimg = null;
                }
            } else {
                $nomeimg = null;
            }

            $c = new Config();
            $cdao = new ConfigDao();

            $c = $cdao->getConfig();

            // pagar antiga imagem
            if (!is_null($c->getImglogoadmin())) {
                unlink("../../../assets/images/config_img/" . $c->getImglogoadmin());
            }

            $c->setImglogoadmin($nomeimg);

            $cdao = new ConfigDao();
            $rs = $cdao->editLogoPainelAdminConfig($c);
            if ($rs > 0) {
                echo "OK|Logo do painel admin alterado com sucesso!";
            }
            //echo "OK|retorno img";
            break;
        case "imgban":
            if (file_exists($_FILES["inputimgban"]["tmp_name"])) {
                list($width, $height, $type, $attr) = getimagesize($_FILES["inputimgban"]["tmp_name"]);

                if ($width > 1200 || $height > 628) {
                    echo "Error|Largura ou altura da imagem inválida!";
                    break;
                }
            }

            if ($_FILES["inputimgban"]["name"] !== "" && isset($_FILES)) {
                $nomeimg = salvaImagem($_FILES["inputimgban"]);

                if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                    $nomeimg = null;
                }
            } else {
                $nomeimg = null;
            }

            $c = new Config();
            $cdao = new ConfigDao();

            $c = $cdao->getConfig();

            // pagar antiga imagem
            if (!is_null($c->getImgsocial())) {
                unlink("../../../assets/images/config_img/" . $c->getImgsocial());
            }

            $c->setImgsocial($nomeimg);

            $cdao = new ConfigDao();
            $rs = $cdao->editBannerSiteConfig($c);
            if ($rs > 0) {
                echo "OK|Banner divulgação do site alterado com sucesso!";
            }
            //echo "OK|retorno img";
            break;
        case "imggif":
            if (file_exists($_FILES["inputimggif"]["tmp_name"])) {
                list($width, $height, $type, $attr) = getimagesize($_FILES["inputimggif"]["tmp_name"]);

                if ($width > 200 || $height > 200) {
                    echo "Error|Largura ou altura da imagem inválida!";
                    break;
                }
            }

            if ($_FILES["inputimggif"]["name"] !== "" && isset($_FILES)) {
                $nomeimg = salvaImagem($_FILES["inputimggif"]);

                if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                    $nomeimg = null;
                }
            } else {
                $nomeimg = null;
            }

            $c = new Config();
            $cdao = new ConfigDao();

            $c = $cdao->getConfig();

            // pagar antiga imagem
            if (!is_null($c->getGifload())) {
                unlink("../../../assets/images/config_img/" . $c->getGifload());
            }

            $c->setGifload($nomeimg);

            $cdao = new ConfigDao();
            $rs = $cdao->editLoadGifConfig($c);
            if ($rs > 0) {
                echo "OK|Gif de preloading alterado com sucesso!";
            }
            break;
        case "imgtop":
            if (file_exists($_FILES["inputimgtop"]["tmp_name"])) {
                list($width, $height, $type, $attr) = getimagesize($_FILES["inputimgtop"]["tmp_name"]);

                if ($width > 2048 || $height > 860) {
                    echo "Error|Largura ou altura da imagem inválida!";
                    break;
                }
            }

            if ($_FILES["inputimgtop"]["name"] !== "" && isset($_FILES)) {
                $nomeimg = salvaImagem($_FILES["inputimgtop"]);

                if ($nomeimg === "ERROR") {
//                    echo "ERROR|img";
                    $nomeimg = null;
                }
            } else {
                $nomeimg = null;
            }

            $c = new Config();
            $cdao = new ConfigDao();

            $c = $cdao->getConfig();

            // pagar antiga imagem
            if (!is_null($c->getImgtopo())) {
                unlink("../../../assets/images/config_img/" . $c->getImgtopo());
            }

            $c->setImgtopo($nomeimg);

            $cdao = new ConfigDao();
            $rs = $cdao->editTopoConfig($c);
            if ($rs > 0) {
                echo "OK|Imagem de topo alterada com sucesso!";
            }
            break;
        default:
            echo "Deveu Papudo!";
            break;
    }
} else {
    echo "Deveu Papudo!";
}