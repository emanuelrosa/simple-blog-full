<div class="row">
    <?php
    $link = $_GET['post'];

    //pega postagem no banco de dados
    $pdao = new PostDao();
    $p = new Post();
    $p = $pdao->getPostByLink($link);

    //adiciona visualização a postagem
    $pdao = new PostDao();
    $pdao->setView($p->getIdpost());

    //pega autor da postagem
    $a = new Autor();
    $adao = new AutorDao();
    $a = $adao->getAutorById($p->getIdautor());
    ?>

    <!-- Blog Post Content Column -->
    <div class="col-lg-12">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?= $p->getTitulo(); ?></h1>

        <!-- Author -->
        <p class="autor">
            por <a href="#"><?= $p->getNomeautor() ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <!-- Date/Time -->
        <?php
        $d = strftime("%A, %d de %B de %Y", strtotime($p->getDatahora()));

        $h = date('H/i/A', strtotime($p->getDatahora()));
        $h = explode("/", $h);
        ?>
        <div class="row">
            <div class="col-md-9">
                <p><span class="glyphicon glyphicon-time"></span> Postado em: <?= $d ?> as <?= $h[0] . ":" . $h[1] . " " . $h[2] ?> </p>
                <p class="resume"><?= $p->getResumo() ?></p>
            </div>
            <div class="col-md-1">
                <div class="fb-like" data-href="<?= $actual_link ?>" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
            </div>
            <div class="col-md-1">
                <!-- Place this tag where you want the +1 button to render. -->
                <div class="g-plusone" data-size="tall"></div>
            </div>
        </div>

        <hr>

        <!-- Preview Image -->
        <?php
        if (!($p->getImagem() === "")) {
            ?>
            <img class="img-responsive" src="<?= $actual_site; ?>/assets/images/ban_posts/<?= $p->getImagem() ?>" alt="<?= $p->getLink() ?>">

            <hr>
            <?php
        }
        ?>

        <!-- Post Content -->
        <div class="post"><?= $p->getMateria() ?></div>

        <hr>

        <!-- Author -->
        <div class='row'>
            <div class='col-md-3' align='center'>
                <?php
                if ($a->getImagem() === "") {
                    ?><img src="<?= $actual_site; ?>/assets/images/authors/user-default.png" title="<?= $a->getNome() ?>" width="70%"><?php
                } else {
                    ?><img src="<?= $actual_site; ?>/assets/images/authors/<?= $a->getImagem() ?>" title="<?= $a->getNome() ?>"><?php
                }
                ?>

            </div>
            <div class='col-md-9'>
                <p><?= $a->getNome() ?></p>
                <p><?= $a->getPerfil() ?></p>
            </div>
        </div>
        <hr>

        <!-- Social Buttons -->
        <div class="row social-share">
            <div class="col-md-6">
                <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a> 
                <a href="#" class="azm-social azm-size-48 azm-r-square azm-whatsapp"><i class="fa fa-whatsapp fa-2x"></i></a>
                <a href="#" target="_blank" class="azm-social azm-size-48 azm-r-square azm-twitter"><i class="fa fa-twitter-square fa-2x"></i></a>
                <a href="#" title="Share on Google Plus" target="_blank" class="azm-social azm-size-48 azm-r-square azm-google-plus"><i class="fa fa-google-plus-square fa-2x"></i></a>
                <a href="#" title="Pin it" target="_blank" class="azm-social azm-size-48 azm-r-square azm-pinterest"><i class="fa fa-pinterest-square fa-2x"></i></a>
                <a href="#" title="Linkedin" target="_blank" class="azm-social azm-size-48 azm-r-square azm-linkedin"><i class="fa fa-linkedin-square fa-2x"></i></a>
                <a href="#" title="Linkedin" target="_blank" class="azm-social azm-size-48 azm-r-square azm-tumblr"><i class="fa fa-tumblr-square fa-2x"></i></a>
            </div>
            <div class="col-md-6" align='right'>
                <a href="#" class="btn btn-primary">Matéria anterior</a>&ensp;
                <a href="#" class="btn btn-primary">Próxima matéria</a>
            </div>
        </div>

    </div>

    <hr>
    <!-- Blog Comments -->

    <?php
    if ($p->getComentario() == '1') {
        //mostra comentário
        ?>

        <br/>&nbsp;
        <br/>&nbsp;
        <!-- Comments -->
        <h2>Comentarios desativados para pré-visualização de noticias.</h2>

        <br />
        <br />
        <hr />
        <?php
    } else {
        //nao mostra comentários
    }
    ?>

</div>

<!-- /.row -->


<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer>
                    {
                        lang: 'pt-BR'
                    }
</script>
