<?php
include_once './config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="MF Agência é uma empresa empenhada em conectar sua empresa a clientes realmente interessados em seu negócio.">
        <meta name="author" content="MF Agência Digital">

        <title>MF Agência | Você conectado com o mundo.</title>

        <!-- meta fecebook -->
        <meta property="og:image" content="http://www.mfagencia.com.br/assets/images/img-face.jpg" />
        <meta property="og:image:type" content="image/jpeg">

        <meta property="fb:admins" content="{YOUR_FACEBOOK_USER_ID_1}"/>
        <meta property="fb:admins" content="{YOUR_FACEBOOK_USER_ID_2}"/>

        <!-- fav and touch icons -->
        <link rel="shortcut icon" href=./assets/images/ico/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="./assets/images/ico/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="./assets/images/ico/apple-icon.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="./assets/images/ico/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="./assets/images/ico/apple-icon-114x114.png" />

        <!-- CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' type='text/css'>
        <link href="assets/css/simple-line-icons.css" rel="stylesheet" media="screen">
        <link href="assets/css/animate.css" rel="stylesheet">

        <!-- Custom styles CSS -->
        <link href="assets/css/style.css" rel="stylesheet" media="screen">

        <script src="assets/js/modernizr.custom.js"></script>

    </head>
    <body>

        <!-- Facebook Comments appId:comocriargames.com.br -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=1430791703884484";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <!-- Preloader
        <div id="preloader">
            <div id="status"></div>
        </div>
        -->

        <!-- Blog start -->
        <!-- Image Top -->
        <div id="home" class="row">
            <div class="col-lg-12">
                <img src="assets/images/top-default.png" title="" width="100%">
            </div>
        </div>

        <!-- Menu Top -->
        <?php include_once './menu.php'; ?>

        <br>
        <div class="container">

            <div class="row">

                <!-- Blog Post Content Column -->
                <div class="col-lg-8">
                    <?php
                    if (isset($_GET['post'])) {
                        //lista todas as categorias
                        $cdao = new CategoriaDao();
                        $rs = $cdao->listAllActivesCategorias();
                        foreach ($rs as $row) {
                            $lcat[] = $row['slug'];
                        }

                        switch ($_GET['post']) {
                            case in_array($_GET['post'], $lcat):
                                include_once './listapostcat.php';
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

                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">

                    <!-- Social Links -->
                    
                    
                    <!-- Blog Search Well -->
                    <div class="search">
                        <h4>Blog Search</h4>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
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
                                <div class="img">
                                    <a href="./<?= $row['link'] ?>" title="<?= $row['titulo'] ?>" ><img class="img-responsive" src="assets/images/ban_posts/<?= $row['imagem'] ?>" alt="<?= $row['titulo'] ?>"></a>
                                </div>
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
                <div class="row">
                    <div class="col-lg-7">
                        <a href="./about" title="" >Sobre o site</a> | 
                        <a href="./terms" title="" >Termos de uso</a> | 
                        <a href="./privacy" title="" >Politica de privacidade</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <p>Copyright &copy; Your Website 2016 - Todos os direitos reservados.</p>
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

        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/smoothscroll.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.easypiechart.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/jquery.cbpQTRotator.js"></script>
        <script src="assets/js/custom.js"></script>

    </body>
</html>