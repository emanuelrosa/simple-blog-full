<?php
$c = new Config();
$cdao = new ConfigDao();

$c = $cdao->getConfig();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Configurações</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class='row'>
    <div class='col-sm-12'>
        <div class="panel panel-primary">
            <div class="panel-heading">Editar configurações</div>
            <div class="panel-body">
                <div class="row">
                    <div id="success-msg" class="col-md-12"></div>
                    <div id="error-msg" class="col-md-12"></div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#informacoes_gerais" aria-controls="informacoes_gerais" role="tab" data-toggle="tab">Informações gerais</a></li>
                            <li role="presentation"><a href="#integracao" aria-controls="integracao" role="tab" data-toggle="tab">Integração</a></li>
                            <li role="presentation"><a href="#redesociais" aria-controls="redesociais" role="tab" data-toggle="tab">Redes sociais</a></li>
                            <li role="presentation"><a href="#imagens" aria-controls="imagens" role="tab" data-toggle="tab">Imagens</a></li>
                            <li role="presentation"><a href="#confcoment" aria-controls="confcoment" role="tab" data-toggle="tab">Conf. comentários</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="informacoes_gerais"><?php include "./config/gerais.php"; ?></div>
                            <div role="tabpanel" class="tab-pane" id="integracao"><?php include "./config/integracao.php"; ?></div>
                            <div role="tabpanel" class="tab-pane" id="redesociais"><?php include "./config/social.php"; ?></div>
                            <div role="tabpanel" class="tab-pane" id="imagens"><?php include "./config/imagens.php"; ?></div>
                            <div role="tabpanel" class="tab-pane" id="confcoment"><?php include "./config/conf_comentario.php"; ?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="../../assets/js/config.js"></script>