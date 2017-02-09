<?php

$red = "http://www.comocriargame.com.br/author/";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])) {

    // Informe o seu App ID abaixo
    $appId = '1430791703884484';

    // Digite o App Secret do seu aplicativo abaixo:
    $appSecret = '450b3c7d255d648f50201e88b76b91eb';

    // Url informada no campo "Site URL"
    $redirectUri = urlencode('http://www.comocriargame.com.br/');

    // Obtém o código da query string
    $code = $_GET['code'];

    // Monta a url para obter o token de acesso e assim obter os dados do usuário
    $token_url = "https://graph.facebook.com/oauth/access_token?"
            . "client_id=" . $appId . "&redirect_uri=" . $redirectUri
            . "&client_secret=" . $appSecret . "&code=" . $code;


    //pega os dados
    $response = @file_get_contents($token_url);
    if ($response) {
        $params = null;
        parse_str($response, $params);
        if (isset($params['access_token']) && $params['access_token']) {
            $graph_url = "https://graph.facebook.com/me?access_token="
                    . $params['access_token'];
            $user = json_decode(file_get_contents($graph_url));

            // nesse IF verificamos se veio os dados corretamente
            if (isset($user->email) && $user->email) {

                /*
                 * Apartir daqui, você já tem acesso aos dados usuario, podendo armazená-los
                 * em sessão, cookie ou já pode inserir em seu banco de dados para efetuar
                 * autenticação.
                 * No meu caso, solicitei todos os dados abaixo e guardei em sessões.
                 */

                include '../dao/Conexao.class.php';
                include '../dao/AutorDao.class.php';
                include '../entidade/Autor.class.php';


                $id = $user->id;
                $nome = $user->first_name . ' ' . $user->last_name;
                $email = $user->email;

                $senha = substr($email, 0, 2) . substr($id, 0, 6);

                $autor = new Autor();
                $adao = new AutorDao();
                if ($adao->verificaLogin($email, $senha) > 0) {
                    session_start();
                    $_SESSION['autentication'] = "1";
                    $_SESSION['email'] = $email;

                    echo("<script type='text/javascript'>location.href='$red';</script>");
                } else {

                    $autor->setAllAtributes(NULL, NULL, $nome, $email, $senha, NULL, $id, '');
                    $adao = new AutorDao();
                    if ($adao->inserirAutor($autor) > 0) {
                        session_start();
                        $_SESSION['autentication'] = "1";
                        $_SESSION['email'] = $email;
                    } else {
                        echo("<script type='text/javascript'> alert('Nao foi possivel realizar cadastro, tente novamente!'); location.href='$red';</script>");
                    }
                }
            }
        } else {
            //echo "Erro de conexão com Facebook";
            header("Location: $red");
            exit(0);
        }
    } else {
        //echo "Erro de conexão com Facebook";
        header("Location: $red");
        exit(0);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['error'])) {
    //echo 'Permissão não concedida';
    header("Location: $red");
}
?>