<div class="row">

    <?php
    //dados da postagem carregada em config.php pois necessita ser lido 
    //antes das metatags para configurações de compartilhamento

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
        <p class="autor">por <a href="#"><?= $p->getNomeautor() ?></a></p>

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

        <!-- ADS 4 -->
        <div class="ads">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- 728x15-CCG-Links Horizontal -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:15px"
                 data-ad-client="ca-pub-6170961506359362"
                 data-ad-slot="6301605949"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <!-- ./ADS 4 -->
        
        
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
                <p><b><?= $a->getNome() ?></b></p>
                <p><i><?= $a->getPerfil() ?></i></p>
            </div>
        </div>
        <hr>

        <!-- Social Buttons -->
        <div class="row social-share">
            <div class="col-md-6">
                <a href="#" class="azm-social azm-size-48 azm-r-square azm-facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>', 'facebook-share-dialog', 'width=626,height=436');
                        return false;"><i class="fa fa-facebook-square fa-2x"></i></a> 
                <a href="whatsapp://send?text='<?= $actual_link ?>'" class="azm-social azm-size-48 azm-r-square azm-whatsapp"><i class="fa fa-whatsapp fa-2x"></i></a>
                <a href="https://twitter.com/share?url=<?= $actual_link ?>" target="_blank" class="azm-social azm-size-48 azm-r-square azm-twitter"><i class="fa fa-twitter-square fa-2x"></i></a>
                <a href="https://plus.google.com/share?url=<?= $actual_link ?>" title="Share on Google Plus" target="_blank" class="azm-social azm-size-48 azm-r-square azm-google-plus"><i class="fa fa-google-plus-square fa-2x"></i></a>
                <a href="http://www.pinterest.com/pin/create/button/?url=<?= $actual_link ?>&description=<?= $p->getResumo() ?>" title="Pin it" target="_blank" class="azm-social azm-size-48 azm-r-square azm-pinterest"><i class="fa fa-pinterest-square fa-2x"></i></a>
                <a href="https://www.linkedin.com/shareArticle?url=<?= $actual_link ?>" title="Linkedin" target="_blank" class="azm-social azm-size-48 azm-r-square azm-linkedin"><i class="fa fa-linkedin-square fa-2x"></i></a>
                <a href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?= $actual_link ?>" title="Linkedin" target="_blank" class="azm-social azm-size-48 azm-r-square azm-tumblr"><i class="fa fa-tumblr-square fa-2x"></i></a>
            </div>
            <div class="col-md-6" align='right'>
                <?php
                $pdao = new PostDao();
                $links = $pdao->getLastPostLink($p->getIdpost());
                $links = explode("|", $links);

                if ($links[0] !== "") {
                    ?><a href="./<?= $links[0] ?>" class="btn btn-primary">Matéria anterior</a><?php
                }
                if ($links[1] !== "") {
                    ?>&nbsp;<a href="./<?= $links[1] ?>" class="btn btn-primary">Próxima matéria</a><?php
                }
                ?>
            </div>
        </div>

    </div>

    <hr>

    <!-- Blog Comments -->

    <?php
    if ($p->getComentario() == '1') {
        //mostra comentário
        ?>
        <!-- Comments -->
        <div class="fb-comments" data-href="<?= $actual_link ?>" data-width="100%" data-numposts="10"></div>

        <hr>

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
