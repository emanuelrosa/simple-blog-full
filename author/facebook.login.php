<?php

$red = "http://www.bushikaijj.com.br";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])) {

    // Informe o seu App ID abaixo
    $appId = '438893722877220';

    // Digite o App Secret do seu aplicativo abaixo:
    $appSecret = '4d7e4ffd26f72f06b3b90bbcd86d068a';

    // Url informada no campo "Site URL"
    $redirectUri = urlencode('http://www.bushikaijj.com.br/');

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

                include "./entidade/Aluno.class.php";
                include "./dao/Conexao.class.php";
                include "./dao/AlunoDao.class.php";

                $alunodao = new AlunoDao();
                $aluno = new Aluno();
                $aluno = $alunodao->getAlunoByEmail($user->email);

                if ($aluno->getIdaluno() > 0) {
                    $_SESSION['loged'] = $user->email;
                    echo("<script type='text/javascript'>location.href='$red';</script>");
                } else {
                    $aluno->setAllAtributes(NULL, $user->first_name, $user->last_name, $user->id, $user->email, $user->location->name, NULL, NULL, $user->id, 'S');
                    $alunodao = new AlunoDao();
                    if ($alunodao->addAluno($aluno)) {
                        $_SESSION['loged'] = $user->email;
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