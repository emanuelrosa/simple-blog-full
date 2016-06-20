<form id="forminteg" action="./actions/config.php" method="post">

    <div class="form-group">
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputheader">Header</label>
                <textarea class="form-control" id="inputheader" name="inputheader" rows="5"><?= $c->getHeader(); ?></textarea>
                <p class="help-block">O condeúdo entrará entre as tags &lt;header&gt;&lt;/header&gt;</p>
            </div>
            <div class="form-group">
                <label for="inputbody">Body</label>
                <textarea class="form-control" id="inputbody" name="inputbody" rows="5"><?= $c->getBody(); ?></textarea>
                <p class="help-block">O condeúdo entrará entre as tags &lt;body&gt;&lt;/body&gt;</p>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>

</form>