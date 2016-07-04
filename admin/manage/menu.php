<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><img src="../../assets/images/config_img/<?= ($config->getImglogoadmin() == "") ? "default_adm.png" : $config->getImglogoadmin(); ?>" title="<?= $config->getTitulo(); ?>"></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: red">
                <i class="fa fa-warning fa-fw"></i> 
                <?php
                $cont = 0;
                $mdao = new MensagemDao();
                $cont = $mdao->getNewCountMensagemError();

                if ($cont > 0) {
                    echo '<span class="label label-danger">' . $cont . '</span>';
                }
                ?>

                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <?php
                if ($cont > 0) {
                    $mdao = new MensagemDao();
                    foreach ($mdao->listMensagemSiteError() as $row) {
                        ?>
                        <li>
                            <a href="?errormessage">
                                <div>
                                    <strong><?= $row['nome'] ?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?= date('d/m/Y', strtotime($row['datahora'])) ?></em>
                                    </span>
                                </div>
                                <div><?= $row['mensagem']; ?></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php
                    }
                }
                ?>
                <li>
                    <a class="text-center" href="?errormessage">
                        <strong>Ver todas as mensagens</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> 
                <?php
                $cont = 0;
                $mdao = new MensagemDao();
                $cont = $mdao->getNewCountMensagemSite();

                if ($cont > 0) {
                    echo '<span class="label label-danger">' . $cont . '</span>';
                }
                ?>

                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <?php
                if ($cont > 0) {
                    $mdao = new MensagemDao();
                    foreach ($mdao->listMensagemSiteSite() as $row) {
                        ?>
                        <li>
                            <a href="#">
                                <div>
                                    <span class="pull-right text-muted">
                                        <em><?= date('d/m/Y', strtotime($row['datahora'])) ?></em>
                                    </span>
                                </div>
                                <div><?= $row['mensagem']; ?></div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php
                    }
                }
                ?>
                <li>
                    <a class="text-center" href="?sitemessage">
                        <strong>Ver todas as mensagens</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="?authors"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Gerenciar Autores</a></li>
                <li><a href="?config"><i class="fa fa-gear fa-fw" aria-hidden="true"></i> Configurações</a></li>
                <li class="divider"></li>
                <li><a href="?sair"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="?"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bullhorn"></i> Blog<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?blogpost">Adicionar posts</a>
                        </li>
                        <li>
                            <a href="?bloglist">Todos os Posts</a>
                        </li>
                        <li>
                            <a href="?blogcategory">Categorias</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-briefcase"></i> Institucional<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="?top">Imagem Topo</a></li>
                        <li><a href="?about">Sobre o site</a></li>
                        <li><a href="?social">Redes sociais</a></li>
                        <li><a href="?terms">Termos de uso</a></li>
                        <li><a href="?privacy">Política de privacidade</a></li>
                        <li><a href="?errormessage">Mensagens de erro</a></li>
                        <li><a href="?sitemessage">Mensagens do site</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!--                <li>
                                    <a href="#"><i class="fa fa-bullhorn fa-server"></i> Email Marketing<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="?campanhas">Campanhas</a>
                                        </li>
                                        <li>
                                            <a href="?leads">Leads</a>
                                        </li>
                                        <li>
                                            <a href="?treinamentos">Treinamentos</a>
                                        </li>
                                        <li>
                                            <a href="?produtos">Produtos</a>
                                        </li>
                                    </ul>
                                     /.nav-second-level 
                                </li>-->

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
