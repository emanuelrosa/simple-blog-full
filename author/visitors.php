        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">Visualizações de Postagens</h2>
            </div>

            <!-- /.col-md-12 -->
        </div>
        <div class='row'>
            <div class='col-sm-12'>

                <div class="panel panel-primary">
                    <div class="panel-heading">Listar Postagens</div>
                    <div class="panel-body">
                        <div id="listPostagem">

                            <table class="table table-bordered table-hover" id="dataTables-listPost" style="font-size: 11px;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Título</th>
                                        <th>Publicado em</th>
                                        <th>Views</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $pdao = new PostDao();
                                    $rs = $pdao->listAllPostActiveByAuthor($a->getIdautor());

                                    foreach ($rs as $row) {
                                        ?>
                                        <tr id="<?= $row['idpost'] ?>" class="<?= ($row['estado'] === "1") ? "success" : ""; ?>">
                                            <td style="width: 2%"></td>
                                            <td style="width: 78%"><?= $row['titulo'] ?></td>
                                            <td style="width: 10%" align="center">
                                                <?= date('d/m/Y', strtotime($row['datahora'])) ?>
                                                <?php
                                                if ($row['estado'] === "3") {
                                                    echo '<span class="label label-warning">Aguardando Correção</span>';
                                                } else if ($row['estado'] === "2") {
                                                    echo '<span class="label label-warning">Em Liberação</span>';
                                                } else if ($row['estado'] === "1") {
                                                    echo '<span class="label label-success">Publicado</span>';
                                                } else {
                                                    echo '<span class="label label-default">Rascunho</span>';
                                                }
                                                ?></td>
                                            <td style="width: 10%" align="center"><b><?= $row['aberto'] ?></b></td>
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