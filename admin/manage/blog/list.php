<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Posts</h1>
    </div>

    <!-- /.col-md-12 -->
</div>
<div class='row'>
    <div class='col-sm-12'>

        <div class="row">
            <div class="col-md-10">
                <?php
                //verifico se exite ordem em array da url ($args[])
                if (in_array("lto", $args)) {
                    $lt = 'class="btn btn-sm btn-primary" disabled=""';
                    $pb = 'class="btn btn-sm btn-default"';
                    $ap = 'class="btn btn-sm btn-default"';
                } else if (in_array("pb", $args)) {
                    $lt = 'class="btn btn-sm btn-default"';
                    $pb = 'class="btn btn-sm btn-primary" disabled=""';
                    $ap = 'class="btn btn-sm btn-default"';
                } else if (in_array("ap", $args)) {
                    $lt = 'class="btn btn-sm btn-default"';
                    $pb = 'class="btn btn-sm btn-default"';
                    $ap = 'class="btn btn-sm btn-primary" disabled=""';
                } else {
                    $lt = 'class="btn btn-sm btn-primary" disabled=""';
                    $pb = 'class="btn btn-sm btn-default"';
                    $ap = 'class="btn btn-sm btn-default"';
                }
                ?>


                <a href="?bloglist/lto" <?= $lt ?>>Listar todos</a> | 
                <a href="?bloglist/pb" <?= $pb ?>>Publicados</a> | 
                <a href="?bloglist/ap" <?= $ap ?>>Aguardand publicação</a>
                <br>
                <br>
            </div>
            <!-- /.col-sm-10 -->
            <div class="col-md-2" align="right">
                <a href="?blogpost" class="btn btn-info" title="Nova postegem"> <span class="fa fa-plus-circle" aria-hidden="true"></span> Nova Postagem</a>
            </div>
            <!-- /.col-sm-2 -->
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Listar Postagens</div>
            <div class="panel-body">
                <div id="listPostagem">

                    <table class="table table-bordered table-hover" id="dataTables-listPost" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                                <th><span class="fa fa-comments" aria-hidden="true"></span></th>
                                <th>Publicado em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pdao = new PostDao();

                            //verifico se exite ordem em array da url ($args[])
                            if (in_array("lto", $args)) {
                                //listando todos
                                $rs = $pdao->listAllPost();
                            } else if (in_array("pb", $args)) {
                                //listar todos publicados
                                $rs = $pdao->listAllPostActive();
                            } else if (in_array("ap", $args)) {
                                //listar todos aguardando publicação
                                $rs = $pdao->listAllPostInative();
                            } else {
                                $rs = $pdao->listAllPost();
                            }

                            foreach ($rs as $row) {
                                ?>
                                <tr id="<?= $row['idpost'] ?>" class="<?= ($row['estado'] === "1") ? "success" : ""; ?>">
                                    <td style="width: 45%"><?= $row['titulo'] ?></td>
                                    <td style="width: 15%" ><?= $row['nomeautor'] ?></td>
                                    <td style="width: 15%; text-align: center" ><?= $row['nomecategoria'] ?></td>
                                    <td style="width: 5%" align="center">
                                        <span class="fb-comments-count" data-href="<?= $_SERVER['SERVER_NAME'] .'/'. $row['link']; ?>"></span>
                                    </td>
                                    <td style="width: 10%" align="center"><?= date('d/m/Y', strtotime($row['datahora'])) ?> <?= ($row['estado'] === "1") ? '<span class="label label-success">Publicado</span>' : '<span class="label label-default">Rascunho</span>' ?></td>
                                    <td style="width: 10%" >
                                        <button class="btn btn-sm btn-info btn-edit" data-id="<?= $row['idpost'] ?>"><span class="fa fa-edit" aria-hidden="true"></span></button>
                                        <button class="btn btn-sm btn-danger btn-remove" data-id="<?= $row['idpost'] ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- DataTables JavaScript -->
<script src="../../assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="../../assets/js/bloglistpost.js"></script>
