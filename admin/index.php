
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="MF Agência é uma empresa empenhada em conectar sua empresa a clientes realmente interessados em seu negócio.">
        <meta name="author" content="MF Agência Digital">

        <title>MF Agência | Você conectado com o mundo.</title>

        <!-- fav and touch icons 
        <link rel="shortcut icon" href="../assets/images/ico/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="../assets/images/ico/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="../assets/images/ico/apple-icon.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/images/ico/apple-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/images/ico/apple-icon-114x114.png" />-->

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
                    <img src="../assets/images/logo/logo200x200.png" />
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