<!-- Blog Post -->
<div>

    <!-- Title -->
    <p class="title">
        <a href="<?= $row['link'] ?>" title="<?= $row['titulo'] ?>"><?= $row['titulo'] ?></a>
    </p>

    <hr>
    <!-- Author -->
    <p class="lead">
        Por <a href="#"><?= $row['nomeautor'] ?></a> &nbsp;&nbsp;&nbsp;

        <!-- Date/Time -->
        <?php
        $date = '2011-05-08';
        $d = strftime("%A, %d de %B de %Y", strtotime($row['datahora']));

        $h = date('H/i/A', strtotime($row['datahora']));
        $h = explode("/", $h);
        ?>
        <span class="glyphicon glyphicon-time"></span> Postado em: <?= utf8_encode($d) ?> as <?= $h[0] . ":" . $h[1] . " " . $h[2] ?>
        &nbsp;&nbsp;&nbsp;
        <span class="glyphicon glyphicon-eye-open"></span> <?= $row['aberto'] ?> views
    </p>

    <hr>

    <!-- Preview Image -->
    <?php
    if (!($row['imagem'] === "")) {
        ?>

        <div class="lazy-img">
            <a href="<?= $row['link'] ?>" title="<?= $row['titulo'] ?>"><img class="img-responsive" src="" data-url="assets/images/ban_posts/<?= $row['imagem'] ?>" alt="<?= $row['titulo'] ?>"></a>
        </div>

        <hr>
        <?php
    }
    ?>

    <!-- Post Content -->
    <p class="resume"><?= $row['resumo'] ?></p>

    <hr>

    <!-- Post Coments -->
    <div class='row'>
        <div class="col-xs-8">
            <div class="visible-md visible-lg" style="float: left">
                <span class="icon-bubble" aria-href="true"></span> 
                <span class="fb-comments-count" data-href="<?= $_SERVER['SERVER_NAME'] . '/' . $row['link']; ?>"></span> 
                comentarios |&nbsp;
            </div>
            <span class="icon-tag" aria-href="true"></span> 
            <?php
            $tags = explode(',', $row['tags']);
            for ($i = 0; count($tags) > $i; $i++) {
                ?><a href="./?tag=<?= $tags[$i] ?>" class="tag"><?= $tags[$i] ?></a> <?php
            }
            ?>
        </div>
        <div class="col-xs-4" align='right'>
            <a href="./<?= $row['link'] ?>" title="#">Leia mais...</a>
        </div>
    </div>

    <hr class="hr-div">

</div>