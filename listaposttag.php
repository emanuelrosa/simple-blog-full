<?php
$tag = $_GET['tag'];

$pdao = new PostDao();
$rs = $pdao->listAllPostActiveByTags($tag);

if ($rs->rowCount() > 0) {
    foreach ($rs as $row) {
        include './vitrine_post.php';
    }
} else {
    ?>
    <div class='row'>
        <div class='col-md-12'>
            <h2>Desculpe!</h2>
            <h4>Não existem postagem para esta categoria específica.<br>Envie uma sugestão de matéria.</h4>
        </div>
    </div>
    <?php
}
?>