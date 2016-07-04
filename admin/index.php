<?php
// INCLUDES
function __autoload($nomeClasse) {
    if (file_exists("../entidade/" . $nomeClasse . ".class.php")) {
        include_once "../entidade/" . $nomeClasse . ".class.php";
    }
    if (file_exists("../dao/" . $nomeClasse . ".class.php")) {
        include_once "../dao/" . $nomeClasse . ".class.php";
    }
}


//URL página atual
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_site = "http://$_SERVER[HTTP_HOST]";

//carrega configuracoes gerais
$config = new Config();
$cdao = new ConfigDao();

$config = $cdao->getConfig();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $config->getDescricao(); ?>">
        <meta name="author" content="<?= $config->getAutor(); ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= $actual_site; ?>/assets/images/ico/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title><?= $config->getTitulo(); ?></title>

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


        <!-- CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
        <link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' type='text/css'>
        <link href="../assets/css/simple-line-icons.css" rel="stylesheet" media="screen">



    </head>
    <body>

        <div class="row" style="margin-top: 50px;">

            <div class="col-sm-3 col-sm-offset-4" align='center'>
                <p>
                    <img src="../assets/images/config_img/<?= ($config->getImglogo() == "") ? "default_logo.png" : $config->getImglogo(); ?>" />
                </p>
            </div>
            <div class="col-sm-3 col-sm-offset-4">
                <form class="form-horizontal" action="logar.php" method="post">
                    <div class="form-group">
                        <label for="inputusuario" class="col-sm-2 control-label">Usuário</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputusuario" name="inputusuario" placeholder="Usuário">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputsenha" class="col-sm-2 control-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputsenha" name="inputsenha" placeholder="Senha">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Javascript files -->

        <script src="../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>

    </body>
</html>