
        <div class = "row menu">
            <div class = "container">
                <div class = "row">
                    <div class = "col-lg-12" style = "background-color:#fff">

                        <nav id = "navbar-example" class = "navbar navbar-custom navbar-static">
                            <div class = "container-fluid">
                                <div class = "navbar-header">
                                    <button class = "navbar-toggle collapsed" type = "button" data-toggle = "collapse" data-target = ".bs-example-js-navbar-collapse">
                                        <span class = "sr-only">Toggle navigation</span>
                                        <span class = "icon-bar"></span>
                                        <span class = "icon-bar"></span>
                                        <span class = "icon-bar"></span>
                                    </button>
                                    <a class = "navbar-brand" href = "<?= $actual_site ?>/author/">
                                        <img src="<?= $actual_site ?>/assets/images/config_img/<?= ($config->getImglogo() !== "") ? $config->getImglogo() : "default_logo.png" ?>" alt="" title=""></a>
                                </div>
                                <div class = "collapse navbar-collapse bs-example-js-navbar-collapse">
                                    <ul class = "nav navbar-nav">
                                        <li><a href="<?= $actual_site ?>/author/">Início</a></li>
                                        <li class="dropdown">
                                            <a id="drop" href="<?= $actual_site ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                Publicar <span class="caret"></span> 
                                            </a> 
                                            <ul class="dropdown-menu" aria-labelledby="drop"> 
                                                <li><a href="<?= $actual_site ?>/author/?post" title="titulo" >Escrever postagem</a></li>
                                            </ul> 
                                        </li>

                                        <li class="dropdown">
                                            <a id="drop" href="<?= $actual_site ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                Arquivo <span class="caret"></span> 
                                            </a> 
                                            <ul class="dropdown-menu" aria-labelledby="drop"> 
                                                <li><a href="<?= $actual_site ?>/author/?listpost" title="titulo" >Listar postagens</a></li>
                                                <li><a href="<?= $actual_site ?>/author/?visitors" title="titulo" >Vizualizações</a></li>
                                            </ul> 
                                        </li>

                                    </ul>

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="?sair"> <span class="fa fa-sign-out fa-1x"></span> Sair</a></li>
                                    </ul>
                                </div>
                            </div> 
                        </nav>

                    </div>
                </div>  
            </div>
        </div>