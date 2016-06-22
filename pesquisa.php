<div id="listaconteudo">
    <?php
    
    $search = $_GET['search'];
    
    $pdao = new PostDao();
    $rs = $pdao->listAllPostSearchActive($search);

    //total de paginas
    $total_page = ceil($rs->rowCount() / 3);

    //Verifica página atual
    if (!isset($_GET['page'])) {
        $pc = 1;
    } else {
        $pc = $_GET["page"];
    }

    //Calcula inicio pesquisa
    $inicio = $pc - 1;
    $inicio = $inicio * $total_page;

    $pdao = new PostDao();
    $rs = $pdao->listAllPostSearchActiveLimit($search, $inicio);

    foreach ($rs as $row) {
        include './vitrine_post.php';
    }
    ?>
</div>
<div class="row">
    <div class="col-md-12" align="right">
        <div class="pagination">
            <a href="#" class="first" data-action="first">&laquo;</a>
            <a href="#" class="previous" data-action="previous">&lsaquo;</a>
            <input id="max-page" type="text" readonly="readonly" data-max-page="<?= $total_page ?>" />
            <a href="#" class="next" data-action="next">&rsaquo;</a>
            <a href="#" class="last" data-action="last">&raquo;</a>
        </div>
    </div>
</div>