<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Autores Blog</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class='row'>
    <div class='col-sm-12'>
        <div class="panel panel-primary">
            <div class="panel-heading">Gerenciamento de Autores</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <form id="formaut" action="./actions/authors.php" class="form form-horizontal">
                            <input type="hidden" name="inputid" id="inputid" value="" />
                            <input type="hidden" name="inputimagem" id="inputimagem" value="" />
                            <input type="hidden" name="inputestado" id="inputestado" value="" />

                            <div id="fileimg" class="form-group">
                                <label for="inputimagem">Imagem perfil</label>
                                <div class="image-upload" align='center'>
                                    <label for="inputimg">
                                        <img id="imguser" src="../../assets/images/authors/user-default.png" width="60px"/>
                                    </label>

                                    <input type="file" accept="image/*" name="inputimg" id="inputimg" />
                                </div>

                            </div>

                            <!-- preview image ban-->
                            <div id="previewimgperfil" class="form-group">
                                <label for="inputimagem">Imagem perfil</label>
                                <div id="previewimg-row" class="previewimg"  align='center'>
                                    <img src="#" id="previewimg" width="60px" >
                                </div>
                            </div>
                            <div><button id="btn-removerimg" class="btn btn-sm btn-danger">Remover imagem</button></div>


                            <div class="form-group">
                                <label for="inputnome">Nome</label>
                                <input type="text" class="form-control" id="inputnome" name="inputnome" />
                            </div>
                            <div class="form-group">
                                <label for="inputdescricao">Perfil</label>
                                <textarea class="form-control" id="inputperfil" name="inputperfil" rows="5"></textarea>
                            </div>

                            <div class="row">
                                <div id="btnAdd" class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Adicionar novo autor</button>
                                    <button type="button" class="btn btn-default btn-cancel">Cancelar</button>
                                </div>
                                <div id="btnEdit" class="col-md-12" style="display: none">
                                    <button id="btn-edit" type="submit" class="btn btn-primary">Alterar autor</button>
                                    <button type="button" class="btn btn-default btn-cancel">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <div id="listAutor" >

                            <table class="table table-striped table-bordered table-hover" id="dataTables-author">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Nome</th>
                                        <th>Perfil</th>
                                        <th>Estado</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $adao = new AutorDao();
                                    foreach ($adao->listAllAutor() as $row) {
                                        ?>
                                        <tr id="<?= $row['idautor'] ?>">
                                            <td style="text-align: center">
                                                <?php
                                                if ($row['imagem'] === "") {
                                                    ?>
                                                    <img src="../../assets/images/authors/user-default.png" width="50px">
                                                    <?php
                                                } else {
                                                    ?><img src="../../assets/images/authors/<?= $row['imagem'] ?>" width="50px"><?php
                                                }
                                                ?>
                                            </td>
                                            <td><?= $row['nome'] ?></td>
                                            <td><?= $row['perfil'] ?></td>
                                            <td id="estado<?= $row['idautor'] ?>" class="center">
                                                <?php
                                                //Ações
                                                if ($row['estado'] == 0) {
                                                    ?><button id="btnEstado-<?= $row['idautor'] ?>" data-id="<?= $row['idautor'] ?>" class="btn btn-sm btn-danger btnChangeEstado" > Inativo </button><?php
                                                } else {
                                                    ?><button id="btnEstado-<?= $row['idautor'] ?>" data-id="<?= $row['idautor'] ?>" class="btn btn-sm btn-success btnChangeEstado" > Ativo </button><?php
                                                }
                                                ?>

                                                <?= ($row['estado'] == 0) ? '' : '' ?>
                                            </td>
                                            <td class="center">
                                                <button data-id="<?= $row['idautor'] ?>" class="btn btn-sm btn-info btnLoadAutor" > <span class="glyphicon glyphicon-edit"></span> </button>
                                                <button data-id="<?= $row['idautor'] ?>" class="btn btn-sm btn-danger btnRemove" > <span class="glyphicon glyphicon-remove"></span> </button>
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
    </div>
</div>

<!-- DataTables JavaScript -->
<script src="../../assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="../../assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="../../assets/js/blogAuthors.js"></script>