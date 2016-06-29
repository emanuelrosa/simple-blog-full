<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Seja bem vindo.</h1>
    </div>
    <!-- /.col-lg-12 -->

    <div class="col-lg-5">

        <div class="panel panel-primary">
            <div class="panel-heading">Visitas nos últimos 7 dias</div>
            <div class="panel-body">
                <div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Data</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vdao = new VisitaDao();
                            $rs = $vdao->listUltamasVisitasSemana();
                            foreach ($rs as $row) {
                                ?>
                                <tr>
                                    <td style="width: 5%"></td>
                                    <td style="width: 60%"><?= date('d/m/Y', strtotime($row['data'])) ?></td>
                                    <td style="width: 35%" align="center" ><?= $row['cont']; ?></td>
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
    <div class="col-lg-7">

        <div class="panel panel-primary">
            <div class="panel-heading">Posts mais visitados nos últimos 7 dias</div>
            <div class="panel-body">
                <div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>URL</th>
                                <th style="text-align: center" >Vis.</th>
                                <th style="text-align: center" ><span class="fa fa-comments" aria-hidden="true"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $vdao = new VisitaDao();
                            $rs = $vdao->listPostsMaisVisitadosSemana();
                            foreach ($rs as $row) {
                                ?>
                                <tr>
                                    <td style="width: 5%"></td>
                                    <td style="width: 60%"><?= $row['url']; ?></td>
                                    <td style="width: 20%" align="center" ><?= $row['cont']; ?></td>
                                    <td style="width: 15%" align="center" ><span class="fb-comments-count" data-href="<?= $_SERVER['SERVER_NAME'] . '/' . $row['url']; ?>"></span></td>
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