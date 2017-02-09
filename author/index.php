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
        <meta name="msapplication-TileColor" content="#000">
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


        <!-- Check Editor -->
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>


        <script src="<?= $actual_site; ?>/assets/js/jquery-1.11.1.min.js"></script>
    </head>
    <body>
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
        ?>

        <?php
        include_once './menu.php';
        ?>

        <div class="container">
            <div class="row">

                <?php
                $args = explode('/', rtrim($_SERVER['QUERY_STRING'], '/'));
                $method = array_shift($args);

                switch ($method) {
                    case "post":
                        include_once './post.php';
                        break;
                    case "listpost":
                        include_once './listpost.php';
                        break;
                    case "visitors":
                        include_once './visitors.php';
                        break;
                    default :
                        include_once './home.php';
                }
                ?>

            </div>
        </div>


        <!-- Javascript files -->
        <script src="<?= $actual_site; ?>/assets/js/jquery-1.11.1.min.js"></script>
        <script async src="<?= $actual_site; ?>/assets/js/modernizr.custom.js"></script>
        <script async src="<?= $actual_site; ?>/assets/js/bootstrap.min.js"></script>

        <?php
        switch ($method) {
            case "post":
                ?>
                <!-- JavaScript -->
                <script src="<?= $actual_site ?>/assets/js/postAuthor.js"></script>
                <?php
                break;
            case "listpost":
                ?>
                <!-- DataTables JavaScript -->
                <script src="<?= $actual_site ?>/assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                <script src="<?= $actual_site ?>/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

                <script src="<?= $actual_site ?>/assets/js/bootbox.min.js"></script>

                <script src="<?= $actual_site ?>/assets/js/bloglistAuthors.js"></script>
                <?php
                break;
            case "visitors":
                ?>
                <!-- DataTables JavaScript -->
                <script src="<?= $actual_site ?>/assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                <script src="<?= $actual_site ?>/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
                <script src="<?= $actual_site ?>/assets/js/visitorsAuthors.js"></script>
                <?php
                break;
            default :
        }
        ?>
    </body>
</html>

<!-- CSS -->
<link href="<?= $actual_site; ?>/assets/css/font-awesome.min.css" rel="stylesheet" media="screen">
<link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet' type='text/css'>

<link href="<?= $actual_site; ?>/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="../assets/css/style-author.css">