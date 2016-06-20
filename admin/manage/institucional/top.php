<?php
$c = new Config();
$cdao = new ConfigDao();

$c = $cdao->getConfig();

$imgtop = "default_top.png";
if ($c->getImgtopo() != "") {
    $imgtop = $c->getImgtopo();
}
?>

<form id="formconfigimg" action="./actions/config.php" method="post">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Configurar imagem topo do site</h1>
        </div>

        <!-- /.col-md-12 -->
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Imagem topo</div>
        <div class="panel-body">

            <div class='row'>
                <div class='col-md-12'>
                    <div id="success-msg" class="col-md-12"></div>
                    <div id="error-msg" class="col-md-12"></div>
                </div>
            </div>

            <div class='row'>
                <div class='col-md-12'>
                    <div id="fileimgtop" class="form-group">
                        <div class="image-upload" align='center'>
                            <label for="inputimgtop">
                                <img id="imgimgtop" src="../../assets/images/config_img/<?= $imgtop; ?>" width="100%"/>
                            </label>

                            <input type="file" accept="image/*" name="inputimgtop" id="inputimgtop" value=""  />
                        </div>

                        <!-- preview image -->
                        <div id="previewimgtop">
                            <div id="previewimg-row" class="previewimg"  align='center'>
                                <img src="#" id="previewimg" width="100%" >
                            </div>
                        </div>
                        <p class="help-block">
                            Imagem do topo de no maximo 2048x860.<br>
                        </p>
                        <div><button id="btn-removerimgtop" class="btn btn-sm btn-danger">Remover imagem</button></div>

                    </div>
                </div>
            </div>
            <!-- ./configurar imagem topo -->
        </div>
    </div>
</form>

<script src="../../assets/js/top.js"></script>
