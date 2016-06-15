<?php
$pdao = new PostDao();
foreach ($pdao->listAllPostActive() as $row) {
    include './vitrine_post.php';
}
?>