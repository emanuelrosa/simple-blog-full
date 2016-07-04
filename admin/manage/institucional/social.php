<?php
$social = new Social();
$socialdao = new SocialDao();

$social = $socialdao->getSocial();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Links para redes sociais</h1>
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
                            <div class="col-md-8">
                                Digite aqui o link para as redes sociais do blog.
                            </div>
                            <div class='col-md-4' align='right'>
                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class='col-md-8'>
                                <input type="hidden" id="inputid" name="inputid" value="<?= $social->getIdsocial() ?>" />
                                <input type="hidden" id="action" name="action" value="social" />
                                <div class="form-group">
                                    <label for="inputinstagram">Instagram</label>
                                    <input type="text" class="form-control" id="inputistagram" name="inputistagram" placeholder="Instagram" value="<?= $social->getInstagram() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputfacebook">Facebook</label>
                                    <input type="text" class="form-control" id="inputfacebook" name="inputfacebook" placeholder="Facebook" value="<?= $social->getFacebook() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputgoogle">Google</label>
                                    <input type="text" class="form-control" id="inputgoogle" name="inputgoogle" placeholder="Google +" value="<?= $social->getGoogle() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputyoutube">Youtube</label>
                                    <input type="text" class="form-control" id="inputyoutube" name="inputyoutube" placeholder="Youtube" value="<?= $social->getYoutube() ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputpinterest">Pinterest</label>
                                    <input type="text" class="form-control" id="inputpinterest" name="inputpinterest" placeholder="Pinterest" value="<?= $social->getPinterest() ?>">
                                </div>
                            </div>
                            <div class='col-md-4'><img src="../../../assets/images/socialmedia1.jpg" alt="" width="100%"/></div>
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
