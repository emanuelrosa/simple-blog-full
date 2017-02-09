<?php
include_once './config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $config->getDescricao(); ?>">
        <meta name="author" content="<?= (isset($_GET['post']) && $_GET['post'] != "preview") ? $a->getNome() : $config->getAutor(); ?>">
        <meta name="msapplication-TileColor" content="#000">
        <meta name="msapplication-TileImage" content="<?= $actual_site; ?>/assets/images/ico/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title><?= $config->getTitulo(); ?></title>
        
        <?php
        if (isset($_GET['post']) && $_GET['post'] != "preview") {

            //se rede social google+ estiver preenchido configura compartilhamento
            if ($s->getGoogle() !== "") {
                ?>
                <!-- Código para Google Authorship e Publisher -->
                <link rel="author" href="<?= $s->getGoogle() ?>/posts"/>
                <link rel="publisher" href="<?= $s->getGoogle() ?>"/>

                <!-- Código do Schema.org também para o Google+ -->
                <meta itemprop="name" content="<?= $p->getTitulo() ?>">
                <meta itemprop="description" content="<?= $p->getResumo() ?>">
                <meta itemprop="image" content="<?= $actual_site; ?>/assets/images/ban_posts/<?= $p->getImagem() ?>">
                <?php
            }
            ?>

            <!-- para o Twitter Card-->
            <meta name="twitter:card" value="summary">
            <meta name="twitter:site" content=" ">
            <meta name="twitter:title" content="<?= $p->getTitulo() ?>">
            <meta name="twitter:description" content="<?= $p->getResumo() ?>">
            <meta name="twitter:creator" content=" ">
            <!-- imagens para o Twitter Summary Card precisam ter pelo menos 200×200 px -->
            <meta name="twitter:image" content="<?= $actual_site; ?>/assets/images/ban_posts/<?= $p->getImagem() ?>">

            <!-- meta fecebook -->
            <meta property="fb:app_id" content="<?= $config->getAppid_facebook() ?>" />
            <meta property="og:locale" content="en_US">
            <meta property="og:url" content="<?= $actual_link ?>">

            <meta property="og:type" content="website">
            <meta property="og:site_name" content="<?= $config->getTitulo() ?>">
            <meta property="og:image:type" content="image/jpeg">

            <meta property="fb:admins" content="<?= $a->getFacebook_id() ?>"/>
            <meta property="fb:admins" content="<?= $config->getFacebook_id() ?>"/>
            <?php
        } else {
            ?>
            <meta property="fb:app_id" content="<?= $config->getAppid_facebook() ?>" />
            <meta property="og:title" content="<?= isset($_GET['post']) ? $p->getTitulo() : $config->getTitulo(); ?>">
            <meta property="og:description" content="<?= isset($_GET['post']) ? $p->getResumo() : $config->getDescricao(); ?>">
            <meta property="og:image" content="<?= isset($_GET['post']) ? $actual_site . "/assets/images/ban_posts/" . $p->getImagem() : $actual_site . "/assets/images/config_img/" . $config->getImgsocial() ?>" />
            <?php
        }
        ?>

        <link rel="alternate" href="<?= (isset($_GET['post'])) ? $actual_link : $actual_site; ?>" hreflang="pt-br" />

        <!-- fav and touch icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $actual_site; ?>/assets/images/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= $actual_site; ?>/assets/images/ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $actual_site; ?>/assets/images/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= $actual_site; ?>/assets/images/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $actual_site; ?>/assets/images/ico/favicon-16x16.png">
        <link rel="manifest" href="<?= $actual_site; ?>/assets/images/ico/manifest.json">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="all" />

        <style>
        <?php
        if (!is_null($config->getGifload())) {
            ?>
                        #preloader{background:#FFF;bottom:0;left:0;position:fixed;right:0;top:0;z-index:9999;}
                        #status{background-image:url(./assets/images/config_img/<?= $config->getGifload(); ?>);background-position:center;background-repeat:no-repeat;height:200px;left:50%;margin:-100px 0 0 -100px;position:absolute;top:50%;width:200px;}
                        .pagination { display: inline-block; border: 1px solid #CDCDCD; border-radius: 3px; margin: 0px;} .pagination a { display: block;float: left;width: 20px;/*height: 20px;*/outline: none;border-right: 1px solid #CDCDCD;border-left: 1px solid #CDCDCD;color: #555555;vertical-align: middle;text-align: center;text-decoration: none;font-weight: bold;font-size: 16px;font-family: Times, 'Times New Roman', Georgia, Palatino;/* ATTN: need a better font stack */background-color: #f3f3f3;background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f3f3f3), color-stop(100%, lightgrey));background-image: -webkit-linear-gradient(#f3f3f3, lightgrey);background-image: linear-gradient(#f3f3f3, lightgrey); }.pagination a:hover, .pagination a:focus, .pagination a:active {background-color: #cecece;background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #e4e4e4), color-stop(100%, #cecece));background-image: -webkit-linear-gradient(#e4e4e4, #cecece);background-image: linear-gradient(#e4e4e4, #cecece); }.pagination a.disabled, .pagination a.disabled:hover, .pagination a.disabled:focus, .pagination a.disabled:active {background-color: #f3f3f3;background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f3f3f3), color-stop(100%, lightgrey));background-image: -webkit-linear-gradient(#f3f3f3, lightgrey);background-image: linear-gradient(#f3f3f3, lightgrey);color: #A8A8A8;cursor: default; }.pagination a:first-child {border: none;border-radius: 2px 0 0 2px; }.pagination a:last-child {border: none;border-radius: 0 2px 2px 0; }.pagination input {float: left;margin: 4px;padding: 0;width: 120px;height: 20px;outline: none;border: none;vertical-align: middle;text-align: center; }/* gigantic class for demo purposes */.gigantic.pagination {margin: 30px 0; }.gigantic.pagination a {height: 60px;width: 60px;font-size: 50px;line-height: 50px; }.gigantic.pagination input {width: 300px;height: 60px;font-size: 30px; }/* log element for demo purposes */ .log {display: none;background-color: #EDEDED;border: 1px solid #B4B4B4;height: 300px;width: 524px;overflow: auto;margin-left: 0;list-style: none;padding: 10px; }.log li {margin-top: 0;margin-bottom: 5px; }
            <?php
        }
        echo file_get_contents("assets/css/bootstrap.min.css");
        echo file_get_contents("assets/css/font-awesome.min.css");
        echo file_get_contents("assets/css/jqpagination.css");
        echo file_get_contents("assets/css/style.css");
        ?>
        </style>

        <?= $config->getHeader(); ?>

        <script async src="assets/js/load.js" type="text/javascript" ></script>
    </head>
    <body style="background-color: #EDEDED;">
        <?= $config->getBody(); ?>
        <?php
        if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) {
            include_once './facebook-pixel-code.php';
        }
        ?>

        <div id="home"></div>
        <?php
        if (!is_null($config->getGifload())) {
            ?>
            <!-- Preloader -->
            <div id="preloader">
                <div id="status" class="img-load"></div>
            </div>
            <?php
        }
        ?>

        <!-- Blog start -->
        <?php
        if ($config->getImgtopo() !== null) {
            ?>
            <!-- Image Top -->
            <div class="row">
                <div class="col-lg-12">
                    <img src="<?= $actual_site; ?>/assets/images/config_img/<?= $config->getImgtopo(); ?>" title="" width="100%">
                </div>
            </div>
            <?php
        }
        // <!-- ./Imagem topo -->
        ?>

        <!-- Menu Top -->
        <?php include_once './menu.php'; ?>

        <br>
        <div class="container">

            <div class="row">

                <!-- Blog Post Content Column -->
                <div class="col-lg-8">
                    <div id="contentcolumn">
                        <!-- ADS 1 -->
                        <?php include './ads1.php'; ?>
                        <!-- ./ADS 1 -->


                        <?php
                        if (isset($_GET['preview'])) {
                            include_once './preview.php';
                        } else if (isset($_GET["search"])) {
                            include_once './pesquisa.php';
                        } else if (isset($_GET['post'])) {
                            //lista todas as categorias
                            $cdao = new CategoriaDao();
                            $rs = $cdao->listAllActivesCategorias();
                            $lcat[] = null;
                            foreach ($rs as $row) {
                                $lcat[] = $row['slug'];
                            }

                            switch ($_GET['post']) {
                                case in_array($_GET['post'], $lcat):
                                    include_once './listapostcat.php';
                                    break;
                                case "contact":
                                    include_once './contato.php';
                                    break;
                                case "about":
                                    include_once './sobre.php';
                                    break;
                                case "privacy":
                                    include_once './privacidade.php';
                                    break;
                                case "terms":
                                    include_once './termos.php';
                                    break;
                                default:
                                    include_once './materia.php';
                                    break;
                            }
                        } else if (isset($_GET['tag'])) {
                            include_once './listaposttag.php';
                        } else {
                            include_once './home.php';
                        }
                        ?>


                    </div>
                </div>

                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">
                    <!-- Social Links -->
                    <div>
                        <h4>Compartilhe</h4>
                        <div class="social-share">

                            <?php
                            //dados de redes sociais lidos em config.php

                            if ($s->getFacebook() !== "") {
                                echo "<a href='" . $s->getFacebook() . "' target='_blank' class='azm-social azm-size-48 azm-r-square azm-facebook'><i class='fa fa-facebook-square fa-3x'></i></a> ";
                            }
                            if ($s->getTwitter() !== "") {
                                echo "<a href='" . $s->getTwitter() . "' target='_blank' class='azm-social azm-size-48 azm-r-square azm-twitter'><i class='fa fa-twitter-square fa-3x'></i></a>";
                            }
                            if ($s->getWhatsapp() !== "") {
                                echo "<a href=\"whatsapp://send?text='" . $s->getWhatsapp() . "'\" class='azm-social azm-size-48 azm-r-square azm-whatsapp'><i class='fa fa-whatsapp fa-3x'></i></a>";
                            }
                            if ($s->getYoutube() !== "") {
                                echo "<a href='" . $s->getYoutube() . "' title='Canal Youtube' target='_blank' class='azm-social azm-size-48 azm-r-square azm-pinterest'><i class='fa fa-youtube-square fa-3x'></i></a>";
                            }
                            if ($s->getInstagram() !== "") {
                                echo "<a href='" . $s->getInstagram() . "' title='Instagram' target='_blank' class='azm-social azm-size-48 azm-r-square azm-instagram'><i class='fa fa-instagram fa-3x'></i></a>";
                            }
                            if ($s->getGoogle() !== "") {
                                echo "<a href='" . $s->getGoogle() . "' title='Google Plus' target='_blank' class='azm-social azm-size-48 azm-r-square azm-google-plus'><i class='fa fa-google-plus-square fa-3x'></i></a>";
                            }
                            if ($s->getPinterest() !== "") {
                                echo "<a href='" . $s->getPinterest() . "' title='Pin it' target='_blank' class='azm-social azm-size-48 azm-r-square azm-pinterest'><i class='fa fa-pinterest-square fa-3x'></i></a>";
                            }
                            ?>
<!--                            <script id="_wau4f6">var _wau = _wau || [];
                                _wau.push(["classic", "tpwj3xqbn0xm", "4f6"]);
                                (function () {
                                    var s = document.createElement("script");
                                    s.async = true;
                                    s.src = "http://widgets.amung.us/classic.js";
                                    document.getElementsByTagName("head")[0].appendChild(s);
                                })();</script>-->
                        </div>
                    </div>

                    <!-- Blog Search Well -->
                    <div class="search">
                        <h4>Pesquisa no blog</h4>
                        <div class="input-group">
                            <input type="text" class="form-control" name="inputsearch" id="inputsearch">
                            <span class="input-group-btn">
                                <button id="btn-search" class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                        <!-- /.input-group -->
                    </div>

                    <!-- Last posts -->
                    <div class="lastpost">
                        <h4>Últimas Postagens</h4>
                        <hr>
                        <ul class="list-unstyled">
                            <?php
                            $pdao = new PostDao();
                            foreach ($pdao->listLastFivePostActive() as $row) {
                                echo '<li><a href="' . $actual_site . "/" . $row['link'] . '"><span>' . $row['titulo'] . '</span></a></li>';
                            }
                            ?>
                        </ul>
                        <!-- /.input-group -->
                    </div>

                    <!-- Facebook timeline -->
                    <?php
                    if ($s->getFacebook() !== "") {
                        ?>
                        <div id="div-face" align='center'>
                            <div class="fb-page" data-href="<?= $s->getFacebook() ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?= $s->getFacebook() ?>" class="fb-xfbml-parse-ignore"><a href="<?= $s->getFacebook() ?>"><?= $config->getTitulo(); ?></a></blockquote></div>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- Melhroes da semana -->
                    <div class="top-week">
                        <h4>Melhores da Semana</h4>
                        <hr>
                        <?php
                        $pdao = new PostDao();
                        $rs = $pdao->listTopViews();
                        foreach ($rs as $row) {
                            ?>
                            <div class="post">
                                <div class="img" style="background-image: url('<?= $actual_site; ?>/assets/images/ban_posts/<?= $row['imagem'] ?>'); background-size: 100%"></div>
                                <div class="res"><a href="<?= $actual_site . "/" . $row['link'] ?>" title="<?= $row['titulo'] ?>" ><?= $row['resumo'] ?></a></div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- ADS 4-->
                    <?php include './ads4.php'; ?>
                    <!-- ./ ADS 4-->
                </div>

            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <?php include_once './footer.php'; ?>
        </div>
        <!-- /.container -->

        <!-- Blog end -->
        <!-- ads mobile -->
        <div id="ads-mb" class="ads-mb visible-xs visible-sm">
            <!--<a href="#" class="btn-fecharadsmb"> Fechar Anúncio</a>-->
            <?php include "./ads-mb.php"; ?>  
        </div>

        <!-- Scroll to top end-->


        <!-- CSS -->
        <link href="assets/css/simple-line-icons.css" rel="stylesheet" media="all" />
        <link href="assets/css/animate.css" rel="stylesheet" media="all" />
        <link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' type='text/css' />

        <!-- Javascript files -->
        <?php
        if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false) {
            ?>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <?php
        }
        ?>

    </body>
</html>