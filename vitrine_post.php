<!-- Blog Post -->
<div>

    <!-- Title -->
    <h1><a href="<?= $row['link'] ?>" title="<?= $row['titulo'] ?>"><?= $row['titulo'] ?></a></h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#"><?= $row['nomeautor'] ?></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <?php
    $date = '2011-05-08';
    $d = strftime("%A, %d de %B de %Y", strtotime($row['datahora']));

    $h = date('H/i/A', strtotime($row['datahora']));
    $h = explode("/", $h);
    ?>
    <p><span class="glyphicon glyphicon-time"></span> Postado em: <?= $d ?> as <?= $h[0] . ":" . $h[1] . " " . $h[2] ?> </p>

    <hr>

    <!-- Preview Image -->
    <?php
    if (!($row['imagem'] === "")) {
        ?>
        <a href="<?= $row['link'] ?>" title="<?= $row['titulo'] ?>"><img class="img-responsive" src="assets/images/ban_posts/<?= $row['imagem'] ?>" alt="<?= $row['titulo'] ?>"></a>

        <hr>
        <?php
    }
    ?>

    <!-- Post Content -->
    <p class="lead"><?= $row['resumo'] ?></p>

    <hr>

    <!-- Post Coments -->
    <div class='row'>
        <div class="col-sm-8">
            <span class="icon-bubble" aria-href="true"></span> 
            <span class="fb-comments-count" data-href="<?= $_SERVER['SERVER_NAME'] . '/' . $row['link']; ?>"></span> 
            comentarios | <span class="icon-tag" aria-href="true"></span> 
            <?php
            $tags = explode(',', $row['tags']);
            for ($i = 0; count($tags) > $i; $i++) {
                ?><a href="./?tag=<?= $tags[$i] ?>"><?= $tags[$i] ?></a><?php
            }
            ?>
        </div>
        <div class="col-sm-4" align='right'>
            <a href="./<?= $row['link'] ?>" title="#">Leia mais...</a>
        </div>
    </div>

    <hr class="hr-div">

</div>