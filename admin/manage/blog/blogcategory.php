<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categorias Blog</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class='row'>
    <div class='col-sm-12'>
        <div class="panel panel-primary">
            <div class="panel-heading">Listar Postagens</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <form id="formcat" action="./actions/blogCategory.php" method="post" class="form form-horizontal">
                            <input type="hidden" name="inputid" id="inputid" value="" />
                            <input type="hidden" name="inputestado" id="inputestado" value="" />
                            <div class="form-group">
                                <label for="inputnome">Nome</label>
                                <input type="text" class="form-control" id="inputnome" name="inputnome" />
                            </div>
                            <div class="form-group">
                                <label for="inputslug">Slug</label>
                                <input type="text" class="form-control" id="inputslug" name="inputslug" />
                                <p class="help-block">O "Slug" é uma versão amigável do URL. Normalmente, é todo em minúsculas e contém apenas letras, números e hífens..</p>
                            </div>
                            <div class="form-group">
                                <div id="selectpai">
                                    <label for="inputdescricao">Pai</label>
                                    <select class="form-control" id="inputpai" name="inputpai" >
                                        <option value="NULL">Nenhum</option>
                                        <?php
                                        $cdao = new CategoriaDao();
                                        foreach ($cdao->listCategorias() as $row) {
                                            echo '<option value="' . $row['idcategoria'] . '">' . $row['nome'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputdescricao">Descrição</label>
                                <textarea class="form-control" id="inputdescricao" name="inputdescricao" rows="5"></textarea>
                            </div>

                            <div class="row">
                                <div id="btnAdd" class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Adicionar nova categoria</button>
                                </div>
                                <div id="btnEdit" class="col-md-12" style="display: none">
                                    <button id="btn-edit" type="submit" class="btn btn-primary">Alterar categoria</button>
                                    <button id="btn-cancel" type="button" class="btn btn-default">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <div id="listCategoria" >

                            <table class="table table-striped table-bordered table-hover" id="dataTables-category" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Post</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cdao = new CategoriaDao();
                                    foreach ($cdao->listAllCategorias() as $row) {
                                        ?>
                                        <tr id="<?= $row['idcategoria'] ?>">
                                            <td style="width: 30%"><a href="" title="<?= 'Slug: ' . $row['slug'] ?>" alt="<?= $row['nome'] ?>"><?= $row['nome'] ?></a></td>
                                            <td style="width: 40%"><?= $row['descricao'] ?></td>
                                            <td align="center"  style="width: 5%"><?= $row['contpost'] ?></td>
                                            <td align="center"  style="width: 25%">
                                                <?php
                                                if ($row['estado'] == 0) {
                                                    ?><button id="btnEstado-<?= $row['idcategoria'] ?>" data-id="<?= $row['idcategoria'] ?>" class="btn btn-sm btn-danger btnChangeEstado" > <span class="glyphicon glyphicon-eye-close"></span> </button><?php
                                                } else {
                                                    ?><button id="btnEstado-<?= $row['idcategoria'] ?>" data-id="<?= $row['idcategoria'] ?>" class="btn btn-sm btn-success btnChangeEstado" > <span class="glyphicon glyphicon-eye-open"></span> </button><?php
                                                }
                                                ?>
                                                

                                                <button data-id="<?= $row['idcategoria'] ?>" class="btn btn-sm btn-info btnLoadCategoria" > <span class="glyphicon glyphicon-edit"></span> </button>
                                                <button data-id="<?= $row['idcategoria'] ?>" class="btn btn-sm btn-danger btnRemove" > <span class="glyphicon glyphicon-remove"></span> </button>
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
<script src="../../assets/js/blogCategory.js"></script>