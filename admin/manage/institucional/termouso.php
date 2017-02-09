<?php
$inst = new Institucional();
$instdao = new InstitucionalDao();

$inst = $instdao->getInstitucional('termosuso');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Termos de uso do site</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class='row'>
    <div class='col-sm-12'>
        <div class="panel panel-primary">
            <div class="panel-heading">Editar texto</div>
            <div class="panel-body">
                <div class="row">
                    <div id="error-msg" class="col-md-12"></div>
                </div>

                <form id="form" action="./actions/institutional.php">

                    <div id="d-conteudo">
                        <div class='row'>
                            <div class='col-md-4 col-md-offset-8' align='right'>
                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class='col-md-8'>
                                <input type="hidden" id="inputid" name="inputid" value="<?= $inst->getIdinstitucional() ?>" />
                                <input type="hidden" id="action" name="action" value="terms" />
                                <div class="form-group">
                                    <textarea rows='7' id="inputConteudo" name="inputConteudo"><?= $inst->getTexto() ?></textarea>
                                    <textarea style="display:none;" rows='4' id="inputCont" name="inputCont"><?= $inst->getTexto() ?></textarea>
                                    <script>
                                        CKEDITOR.replace('inputConteudo', {
                                            height: '30em',
                                            filebrowserBrowseUrl: './ckeditor/ckfinder/ckfinder.html',
                                            filebrowserImageBrowseUrl: './ckeditor/ckfinder/ckfinder.html?type=Images',
                                            filebrowserFlashBrowseUrl: './manage/ckeditor/ckfinder/ckfinder.html?type=Flash',
                                            filebrowserUploadUrl: './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                            filebrowserImageUploadUrl: './manage/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                        });
                                    </script>
                                </div>

                            </div>
                            <div class='col-md-4'>

                                <!-- Estado Postagem -->
                                <div class="panel-group" id="accordionEstado" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionEstado" href="#collapseEstadoOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Liberar texto
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseEstadoOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    Liberar texto assim que publicada?
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="inputestado" id="inputestado" value="1" <?= ($inst->getEstado() === '1') ? "checked" : ""; ?>> Sim
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="inputestado" id="inputestado" value="0" aria-label="..." <?= ($inst->getEstado() === '0') ? "checked" : "checked"; ?>> Não
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-md-4 col-md-offset-8' align='right'>
                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- DataTables JavaScript -->
<script src="../../assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="../../assets/js/insitutional.js"></script>
