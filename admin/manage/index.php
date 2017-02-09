<?php
session_start();

include './config.php';
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

        <!-- Bootstrap Core CSS -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../../assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../assets/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="../../assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../../assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../../assets/css/jquery.datetimepicker.min.css" rel="stylesheet">

        <!-- JQuery -->
        <script type="text/javascript" src="../../assets/js/jquery-1.11.1.min.js"></script>

        <!-- Check Editor -->
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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
        <div id="wrapper">

            <?php include "./menu.php"; ?>

            <div id="page-wrapper">
                <?php
                $args = explode('/', rtrim($_SERVER['QUERY_STRING'], '/'));
                $method = array_shift($args);

                switch ($method) {
                    case "blogpost":
                        include_once './blog/post.php';
                        break;
                    case "bloglist":
                        include_once './blog/list.php';
                        break;
                    case "blogcategory":
                        include_once './blog/blogcategory.php';
                        break;
                    case "authors":
                        include_once './autor/authorsControl.php';
                        break;
                    case "config":
                        include_once './config/index.php';
                        break;
                    case "top":
                        include_once './institucional/top.php';
                        break;
                    case "about":
                        include_once './institucional/sobre.php';
                        break;
                    case "social":
                        include_once './institucional/social.php';
                        break;
                    case "terms":
                        include_once './institucional/termouso.php';
                        break;
                    case "privacy":
                        include_once './institucional/privacidade.php';
                        break;
                    case "errormessage":
                        include_once './institucional/msgerror.php';
                        break;
                    case "sitemessage":
                        include_once './institucional/msgsite.php';
                        break;

                    default:
                        include_once './home.php';
                        break;
                }
                ?>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/js/bootbox.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../assets/js/sb-admin-2.js"></script>



    </body>

</html>
