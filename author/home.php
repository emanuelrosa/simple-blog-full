<?php ?>

<div class="row home">

    <div class="col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading"> <span class="fa fa-bars fa-2x"></span> &nbsp;&nbsp;<b>INICIAR PUBLICAÇÃO</b></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="panel panel-default">
                            <div class="panel-body" align='center'>
                                <a href="?post">
                                    <span class="fa fa-files-o fa-3x"></span><br>
                                    Nova postagem
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body" align='center'>
                                <a href="?post">
                                    <span class="fa fa-microphone fa-3x"></span><br>
                                    Novo Audio
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"> <span class="fa fa-user fa-2x"></span> &nbsp;&nbsp;<b>GERIR SUA CONTA</b></div>
                    <div class="panel-body">
                        <ul>
                            <li><a href="?listpost">Listar postagens</a></li>
                            <li><a href="?visitors">Visualizações das postagens</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"> <span class="fa fa-user fa-2x"></span> &nbsp;&nbsp;<b>Melhores Postagens Atualmente</b></div>
                    <div class="panel-body">
                        <ul>
                            <?php
                            $pdao = new PostDao();
                            foreach ($pdao->listTopViewsByWeek() as $row) {
                                echo "<li>{$row['url']}</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
