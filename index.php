<?php
include_once './config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $config->getDescricao(); ?>">
        <meta name="author" content="<?= $config->getAutor(); ?>">

        <title><?= $config->getTitulo(); ?></title>

        <!-- meta fecebook -->
        <meta property="og:image" content="<?= $actual_site; ?>assets/images/config_img/<?= $config->getImgsocial(); ?>" />
        <meta property="og:image:type" content="image/jpeg">

        <!--<meta property="fb:admins" content="{YOUR_FACEBOOK_USER_ID_1}"/>-->

        <!-- fav and touch icons 
        <link rel="shortcut icon" href="./assets/images/ico/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="./assets/images/ico/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="./assets/images/ico/apple-icon.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="./assets/images/ico/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="./assets/images/ico/apple-icon-114x114.png" />-->

        <!-- CSS -->
        <link href="<?= $actual_site; ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?= $actual_site; ?>assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' type='text/css'>
        <link href="<?= $actual_site; ?>assets/css/simple-line-icons.css" rel="stylesheet" media="screen">
        <link href="<?= $actual_site; ?>assets/css/animate.css" rel="stylesheet">

        <link href="<?= $actual_site; ?>assets/css/jqpagination.css" rel="stylesheet">


        <!-- Custom styles CSS -->
        <link href="<?= $actual_site; ?>assets/css/style.css" rel="stylesheet" media="screen">

        <script src="<?= $actual_site; ?>assets/js/modernizr.custom.js"></script>

        <?= $config->getHeader(); ?>

    </head>
    <body>
        <div id="home"></div>
        <?= $config->getBody(); ?>

        <!-- Facebook Comments appId -->
        <?php
        if (!is_null($config->getAppid_facebook()) || $config->getAppid_facebook() !== "") {
            ?>
            <div id="fb-root"></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=<?= $config->getAppid_facebook(); ?>";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>                
            <?php
        }


        if (!is_null($config->getGifload())) {
            ?>
            <!-- Preloader -->
            <div id="preloader">
                <div id="status" style="background-image: url(./assets/images/config_img/<?= $config->getGifload(); ?>);"></div>
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
                    <img src="<?= $actual_site; ?>assets/images/config_img/<?= $config->getImgtopo(); ?>" title="" width="100%">
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
                        <?php
                        if (isset($_GET["search"])) {
                            include_once './pesquisa.php';
                        } else if (isset($_GET['post'])) {
                            //lista todas as categorias
                            $cdao = new CategoriaDao();
                            $rs = $cdao->listAllActivesCategorias();
                            foreach ($rs as $row) {
                                $lcat[] = $row['slug'];
                            }

                            switch ($_GET['post']) {
                                case "preview":
                                    include_once './listapostcat.php';
                                    break;
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
                        <div class="social-share">

                            <?php
                            $s = new Social();
                            $sdao = new SocialDao();

                            $s = $sdao->getSocial();

                            if ($s->getFacebook() !== "") {
                                echo "<a href='" . $s->getFacebook() . "' target='_blank' class='azm-social azm-size-48 azm-r-square azm-facebook'><i class='fa fa-facebook-square fa-3x'></i></a> ";
                            }

                            if ($s->getWhatsapp() !== "") {
                                echo "<a href=\"whatsapp://send?text='" . $s->getWhatsapp() . "'\" class='azm-social azm-size-48 azm-r-square azm-whatsapp'><i class='fa fa-whatsapp fa-3x'></i></a>";
                            }
                            if ($s->getTwitter() !== "") {
                                echo "<a href='" . $s->getTwitter() . "' target='_blank' class='azm-social azm-size-48 azm-r-square azm-twitter'><i class='fa fa-twitter-square fa-3x'></i></a>";
                            }
                            if ($s->getGoogle() !== "") {
                                echo "<a href='" . $s->getGoogle() . "' title='Google Plus' target='_blank' class='azm-social azm-size-48 azm-r-square azm-google-plus'><i class='fa fa-google-plus-square fa-3x'></i></a>";
                            }
                            if ($s->getPinterest() !== "") {
                                echo "<a href='" . $s->getPinterest() . "' title='Pin it' target='_blank' class='azm-social azm-size-48 azm-r-square azm-pinterest'><i class='fa fa-pinterest-square fa-3x'></i></a>";
                            }
                            if ($s->getYoutube() !== "") {
                                echo "<a href='" . $s->getPinterest() . "' title='Canal Youtube' target='_blank' class='azm-social azm-size-48 azm-r-square azm-pinterest'><i class='fa fa-youtube-square fa-3x'></i></a>";
                            }
                            ?>

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
                                echo '<li><a href="' . $row['link'] . '"><span>' . $row['titulo'] . '</span></a></li>';
                            }
                            ?>
                        </ul>
                        <!-- /.input-group -->
                    </div>

                    <!-- Adsense -->


                    <!-- Facebook timeline UTGAMES -->
                    <div align='center'>
                        <div class="fb-page" data-href="https://www.facebook.com/UTGames/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/UTGames/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/UTGames/">Utility Games</a></blockquote></div>
                    </div>

                    <!-- Sucessos da semana -->
                    <div class="top-week">
                        <h4>Melhores da Semana</h4>
                        <hr>
                        <?php
                        $pdao = new PostDao();
                        foreach ($pdao->listTopViews() as $row) {
                            ?>
                            <div class="post">
                                <div class="img" style="background-image: url('<?= $actual_site; ?>assets/images/ban_posts/<?= $row['imagem'] ?>'); background-size: 100%"></div>
                                <div class="res"><a href="./<?= $row['link'] ?>" title="<?= $row['titulo'] ?>" ><?= $row['resumo'] ?></a></div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                </div>

            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <!-- Error site modal -->
                <div class="modal fade" id="errorSiteModal" tabindex="-1" role="dialog" aria-labelledby="errorSiteModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form id="error-form" action="assets/php/error.php" >
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Erro no site?</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="loading alert alert-info">
                                                <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                                                <span class="sr-only">Loading...</span> Estamos enviando sua mensagem...
                                            </div>
                                        </div>
                                        <div class="col-md-12 ajax-response"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputnome">Nome</label>
                                                <input type="text" class="form-control" id="inputnome" name="inputnome">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputemail">Email</label>
                                                <input type="email" class="form-control" id="inputemail" name="inputemail">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="inputmsg">Mensagem</label>
                                            <textarea class="form-control" id="inputmsg" name="inputmsg" rows="5" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-7">
                        <a href="./about" title="" >Sobre o site</a> | 
                        <a href="./terms" title="" >Termos de uso</a> | 
                        <a href="./privacy" title="" >Politica de privacidade</a> |
                        <a href="#" title="Mensagem de error" data-toggle="modal" data-target="#errorSiteModal" >Encontrou algum erro?</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <p>Copyright &copy; <?= $actual_site ?> 2016 - Todos os direitos reservados.</p>
                    </div>
                    <div class="col-lg-5" align='right'>
                        <p>Por <a href="http://www.mfagencia.com.br" title="">MF Agência</a></p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->

        <!-- Blog end -->

        <!-- Scroll to top -->
        <div class="scroll-up">
            <a href="#home"><i class="fa fa-angle-up"></i></a>
        </div>

        <!-- Scroll to top end-->


        <!-- Javascript files -->

        <script src="<?= $actual_site; ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?= $actual_site; ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= $actual_site; ?>assets/js/imagesloaded.pkgd.js"></script>
        <script src="<?= $actual_site; ?>assets/js/jquery.sticky.js"></script>
        <script src="<?= $actual_site; ?>assets/js/jquery.cbpQTRotator.js"></script>

        <script src="<?= $actual_site; ?>assets/js/jquery.jqpagination.min.js"></script>
        <script src="<?= $actual_site; ?>assets/js/custom.js"></script>

    </body>
</html>