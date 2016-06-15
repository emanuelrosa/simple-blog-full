<?php
$mdao = new MensagemDao();
$mdao->setMesagemErrorVistos();
?>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Mensagens de erro do site</h1>
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
                    $re = 'class="btn btn-sm btn-default"';
                    $ab = 'class="btn btn-sm btn-default"';
                } else if (in_array("ab", $args)) {
                    $lt = 'class="btn btn-sm btn-default"';
                    $ab = 'class="btn btn-sm btn-primary" disabled=""';
                    $re = 'class="btn btn-sm btn-default"';
                } else if (in_array("re", $args)) {
                    $lt = 'class="btn btn-sm btn-default"';
                    $ab = 'class="btn btn-sm btn-default"';
                    $re = 'class="btn btn-sm btn-primary" disabled=""';
                } else {
                    $lt = 'class="btn btn-sm btn-primary" disabled=""';
                    $re = 'class="btn btn-sm btn-default"';
                    $ab = 'class="btn btn-sm btn-default"';
                }
                ?>


                <a href="?errormessage/lto" <?= $lt ?>>Listar todos</a> | 
                <a href="?errormessage/ab" <?= $ab ?>>Em aberto</a> | 
                <a href="?errormessage/re" <?= $re ?>>Resolvidos</a>
                <br>
                <br>
            </div>
            <!-- /.col-sm-10 -->
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Listar Mensagens</div>
            <div class="panel-body">
                <div id="listMsg">

                    <table class="table table-bordered table-hover" id="dataTables-msg" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th>Nome / E-mail</th>
                                <th>Mensagem</th>
                                <th>Em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $mdao = new MensagemDao();

                            //verifico se exite ordem em array da url ($args[])
                            if (in_array("lto", $args)) {
                                // 'listando todos'
                                $rs = $mdao->listMensagemErro();
                            } else if (in_array("ab", $args)) {
                                //listar todos 'em aberto'
                                $rs = $mdao->listMensagemErroAberto();
                            } else if (in_array("re", $args)) {
                                //listar todos 'resolvidos'
                                $rs = $mdao->listMensagemErroResolvido();
                            } else {
                                $rs = $mdao->listMensagemErro();
                            }

                            foreach ($rs as $row) {
                                ?>
                                <tr id="<?= $row['idmensagem'] ?>" class="<?= ($row['estado'] === "1") ? "success" : ""; ?>">
                                    <td style="width: 15%"><?= $row['nome'] ?><br><?= $row['email'] ?></td>
                                    <td style="width: 65%" ><?= $row['mensagem'] ?></td>
                                    <td style="width: 10%" align="center"><?= date('d/m/Y', strtotime($row['datahora'])) ?> <?= ($row['estado'] === "1") ? '<span class="label label-success">Resolvido</span>' : '<span class="label label-default">Em Aberto</span>' ?></td>
                                    <td style="width: 10%" align="center" >
                                        <?php
                                        if($row['estado'] === "0") {
                                            ?><button class="btn btn-sm btn-success btn-edit" data-id="<?= $row['idmensagem'] ?>"><span class="fa fa-check-circle" aria-hidden="true"></span></button><?php
                                        }
                                        ?>
                                        <button class="btn btn-sm btn-danger btn-remove" data-id="<?= $row['idmensagem'] ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
<script src="../../assets/js/listmsgerror.js"></script>
