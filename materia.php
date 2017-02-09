<?php
if ($p->getIdpost() > 0) {
    ?>
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

            <!-- Blog Post -->

            <!-- Title -->
            <div class="title">
                <h1><?= $p->getTitulo(); ?></h1>                
            </div>


            <!-- Author -->
            <p class="autor">Por <a href="#"><?= $p->getNomeautor() ?></a></p>

            <hr>

            <!-- Date/Time -->
            <?php
            $d = strftime("%A, %d de %B de %Y", strtotime($p->getDatahora()));

            $h = date('H/i/A', strtotime($p->getDatahora()));
            $h = explode("/", $h);
            ?>
            <div class="row">
                <div class="col-md-12">
                    <p><span class="glyphicon glyphicon-time"></span> Postado em: <?= utf8_encode($d) ?> as <?= $h[0] . ":" . $h[1] . " " . $h[2] ?> &nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span> <?= $p->getAberto(); ?> views</p></p>
                    <p class="resume"><?= $p->getResumo() ?></p>
                </div>
            </div>
            <hr>

            <!-- Social butons share -->
            <div class="row social-row">

                <div class="col-md-12 col-sm-12 social">

                    <ul>
                        <li class="twitter">
                            <iframe allowtransparency="true" class="twitter-share-button" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.html?count=vertical&amp;type=share&amp;url=<?= $actual_link ?>&amp;via=BjjBlitzz" style="border: none; overflow: auto; width: 58px; height: 63px;"></iframe>
                        </li>
                        <li class="facebook">
                            <iframe src="https://www.facebook.com/plugins/like.php?href=<?= $actual_link ?>&amp;show_faces=false&amp;layout=button_count" scrolling="no" frameborder="0" style="height: 21px; width: 100px" allowTransparency="true"></iframe>
                        </li>
                        <li class="google">
                        <g:plusone size="medium" href="<?= $actual_link ?>"></g:plusone>
                        </li>
                    </ul>

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
            <div class="post">
                <div class="ads-post">
                    <!-- ADS 2-->
                    <?php include './ads2.php'; ?>
                    <!-- ./ ADS 2-->
                </div>
                <?= $p->getMateria() ?>
            </div>

            <hr>

            <!-- Social Buttons -->
            <div class="row social-share visible-xs visible-sm">
                <div class="col-sm-12">
                    <h3>Gostou? Compartilhe essa materia...</h3>
                    <a href="#" class="azm-social azm-size-48 azm-r-square azm-facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>', 'facebook-share-dialog', 'width=626,height=436');
                                return false;"><i class="fa fa-facebook-square fa-3x"></i></a> 
                    <a href="whatsapp://send?text=<?= $actual_link ?>" class="azm-social azm-size-48 azm-r-square azm-whatsapp"><i class="fa fa-whatsapp fa-3x"></i></a>
                    <a href="https://twitter.com/share?url=<?= $actual_link ?>" target="_blank" class="azm-social azm-size-48 azm-r-square azm-twitter"><i class="fa fa-twitter-square fa-3x"></i></a>
                    <a href="https://plus.google.com/share?url=<?= $actual_link ?>" title="Share on Google Plus" target="_blank" class="azm-social azm-size-48 azm-r-square azm-google-plus"><i class="fa fa-google-plus-square fa-3x"></i></a>
                    <a href="http://www.pinterest.com/pin/create/button/?url=<?= $actual_link ?>&description=<?= $p->getResumo() ?>" title="Pin it" target="_blank" class="azm-social azm-size-48 azm-r-square azm-pinterest"><i class="fa fa-pinterest-square fa-3x"></i></a>
                    <a href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?= $actual_link ?>" title="Tumblr" target="_blank" class="azm-social azm-size-48 azm-r-square azm-tumblr"><i class="fa fa-tumblr-square fa-3x"></i></a>
                </div>
                <br>
                <div class="col-xs-6" align='left'>
                    <?php
                    $pdao = new PostDao();
                    $links = $pdao->getLastPostLink($p->getIdpost());
                    $links = explode("|", $links);

                    if ($links[0] !== "") {
                        ?><a href="./<?= $links[0] ?>" class="btn btn-md btn-primary">Matéria anterior</a><?php
                    }
                    ?>
                </div>
                <div class="col-xs-6" align='right'>
                    <?php
                    if ($links[1] !== "") {
                        ?>&nbsp;<a href="./<?= $links[1] ?>" class="btn btn-md btn-primary">Próxima matéria</a><?php
                    }
                    ?>
                </div>
                <br>
                <br>
            </div>

            <!-- ADS 3 -->
            <?php include './ads3.php'; ?>
            <!-- ./ADS 3 -->

            <!-- Author -->
            <hr>
            <h4>Autor:</h4>
            <div class='row'>
                <div class='col-xs-3' align='center'>
                    <?php
                    if ($a->getImagem() === "") {
                        ?><img src="<?= $actual_site; ?>/assets/images/authors/user-default.png" title="<?= $a->getNome() ?>" width="70%"><?php
                    } else {
                        ?><img src="<?= $actual_site; ?>/assets/images/authors/<?= $a->getImagem() ?>" title="<?= $a->getNome() ?>"><?php
                    }
                    ?>

                </div>
                <div class='col-xs-9'>
                    <p><b><?= $a->getNome() ?></b></p>
                    <p><i><?= $a->getPerfil() ?></i></p>
                </div>
            </div>
            

            <!-- Social Buttons -->
            <div class="row social-share visible-md visible-lg">
                <hr>
                
                <div class="col-md-6">
                    <a href="#" class="azm-social azm-size-48 azm-r-square azm-facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>', 'facebook-share-dialog', 'width=626,height=436');
                                return false;"><i class="fa fa-facebook-square fa-2x"></i></a> 
                    <a href="whatsapp://send?text=<?= $actual_link ?>" class="azm-social azm-size-48 azm-r-square azm-whatsapp"><i class="fa fa-whatsapp fa-2x"></i></a>
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

    <?php
    //dados da postagem carregada em config.php pois necessita ser lido 
    //antes das metatags para configurações de compartilhamento
    //adiciona visualização a postagem
    $pdao = new PostDao();
    $pdao->setView($p->getIdpost());
    ?>
    <?php
} else {
    ?>
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

            <!-- Blog Post -->

            <!-- Title -->
            <h2>Ops...</h2>
            <h3>Desculpe, não encontramos o que está procurando.</h3>
        </div>
    </div>
<?php } ?>