<form id="formconfigcoment" action="./actions/config.php" method="post">
    <div class="form-group">
        <div class="col-md-6">
            <div class="form-group">
                <label for="inputappid">APPID Facebook</label>
                <input type="text" class="form-control" id="inputappid" name="inputappid" value="<?= $c->getAppid_facebook(); ?>" placeholder="AppID Facebook ">
            </div>
            <div class="form-group">
                <label for="inputappid">ID usuário Facebook</label>
                <input type="text" class="form-control" id="inputuserid" name="inputuserid" value="<?= $c->getFacebook_id(); ?>" placeholder="User ID Facebook ">
                <p class="help-block">Id usuário Master para gerenciar todos os comentários das postagens.</p>
            </div>
            <div class="form-group">
                <label for="inputnumcomentario">Numero de comentários visíveis</label>
                <input type="text" class="form-control" id="inputnumcomentario" name="inputnumcomentario" value="<?= $c->getNum_comentarios_visivel(); ?>" placeholder="10">
                <p class="help-block">opte pelo números 5 - 10 - 20</p>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>

</form>