
<div class = "row menu">
    <div class = "container">
        <div class = "row">
            <div class = "col-xs-12 col-sm-12 col-lg-12" style="background-color:transparent;">

                <nav style="background-color: transparent;" class = "navbar navbar-custom navbar-static">
                    <div class = "container-fluid">
                        <div class = "navbar-header">
                            <button class = "navbar-toggle collapsed" type = "button" data-toggle = "collapse" data-target = ".bs-example-js-navbar-collapse">
                                <span class = "sr-only">Toggle navigation</span>
                                <span class = "icon-bar"></span>
                                <span class = "icon-bar"></span>
                                <span class = "icon-bar"></span>
                            </button>
                            <a class = "navbar-brand" href = "<?= $actual_site ?>">Início</a>
                        </div>
                        <div class = "collapse navbar-collapse bs-example-js-navbar-collapse">
                            <ul class = "nav navbar-nav">

                                <?php
                                $cdao = new CategoriaDao();
                                foreach ($cdao->listActivesCategorias() as $row) {

                                    $cdao1 = new CategoriaDao();
                                    $rs = $cdao1->listActivesSubcategorias($row['idcategoria']);
                                    if ($rs->rowCount() > 0) {
                                        //categorias com subcategorias
                                        ?>
                                        <li class="dropdown">
                                            <a id="drop" href="<?= $actual_site . $row['slug'] ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                <?= $row['nome'] ?> <span class="caret"></span> 
                                            </a> 
                                            <ul class="dropdown-menu" aria-labelledby="drop2"> 
                                                <?php
                                                foreach ($rs as $row1) {
                                                    ?>
                                                    <li><a href="<?= $actual_site . '/' . $row1['slug'] ?>" title="<?= $row1['nome'] ?>" ><?= $row1['nome'] ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul> 
                                        </li> 
                                        <?php
                                    } else {
                                        //categorias sem subcategorias
                                        ?>
                                        <li class="dropdown">
                                            <a id="drop" href="<?= $actual_site . '/' . $row['slug'] ?>" role="button" aria-haspopup="true" aria-expanded="false" title="<?= $row['nome'] ?>" >
                                                <?= $row['nome'] ?>
                                            </a>
                                        </li> 
                                        <?php
                                    }
                                }
                                ?>
                                <li>
                                    <a id="drop" href="<?= $actual_site; ?>/contact" role="button" aria-haspopup="true" aria-expanded="false" title="Contato" >
                                        Contato
                                    </a>
                                </li>    
                            </ul>
                        </div> 
                    </div> 
                </nav>

            </div>
        </div>  
    </div>
</div>