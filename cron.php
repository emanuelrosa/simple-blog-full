<?php

// INCLUDES
function __autoload($nomeClasse) {
    if (file_exists("./entidade/" . $nomeClasse . ".class.php")) {
        include_once "./entidade/" . $nomeClasse . ".class.php";
    }
    if (file_exists("./dao/" . $nomeClasse . ".class.php")) {
        include_once "./dao/" . $nomeClasse . ".class.php";
    }
}

echo $datahoraatual = date("Y-m-d H:i:s");
echo "<br><br>";
$pdao = new PostDao();
$rs = $pdao->activePosts($datahoraatual);

echo $rs->rowCount();