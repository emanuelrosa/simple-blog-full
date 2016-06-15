<?php
$mdao = new MensagemDao();
$mdao->setMesagemSiteVistos();
?>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">Mensagens do site</h1>
    </div>

    <!-- /.col-md-12 -->
</div>
<div class='row'>
    <div class='col-sm-12'>

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
                            $rs = $mdao->listTodasMensagemSite();
                            foreach ($rs as $row) {
                                ?>
                                <tr id="<?= $row['idmensagem'] ?>" class="<?= ($row['estado'] === "1") ? "success" : ""; ?>">
                                    <td style="width: 15%"><?= $row['nome'] ?><br><?= $row['email'] ?></td>
                                    <td style="width: 65%" ><?= $row['mensagem'] ?></td>
                                    <td style="width: 10%" align="center"><?= date('d/m/Y H:i:s', strtotime($row['datahora'])) ?></td>
                                    <td style="width: 10%" align="center" >
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
