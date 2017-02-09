<div id="listaconteudo">
    <?php
    //pego dados de categoria
    $slug = $_GET['post'];

    $cat = new Categoria();
    $cdao = new CategoriaDao();
    $cat = $cdao->getCategoriaBySlug($slug);

    //pegar consulta completa com todos os resultados
    $pdao = new PostDao();
    $rs = $pdao->listAllPostActiveByCategory($cat->getIdcategoria());

    //total de paginas
    $total_page = ceil($rs->rowCount() / 5);

    //Verifica página atual
    if (!isset($_GET['page'])) {
        $pc = 1;
    } else {
        $pc = $_GET["page"];
    }

    //Calcula inicio pesquisa
    $inicio = $pc - 1;
    $inicio = $inicio * 5;

    $pdao = new PostDao();
    $rs = $pdao->listAllPostActiveByCategoryLimit($cat->getIdcategoria(), $inicio);

    //$rs->rowCount();

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
<div>
    <?php include './ads1.php'; ?>
</div>