<form id="formgerais" action="./actions/config.php" method="post">

    <div class="form-group">
        <div class="col-md-9">
            <div class="form-group">
                <label for="inputurl">URL do site</label>
                <input type="text" class="form-control" id="inputurl" name="inputurl" value="" placeholder="http://www.exemplo.com.br">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="inputano">Ano de Criação</label>
                <input type="text" class="form-control" id="inputano" name="inputano" value="" placeholder="2016">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputtitulo">Título do site</label>
                <input type="text" class="form-control" id="inputtitulo" name="inputtitulo" value="<?= $c->getTitulo(); ?>" placeholder="Titulo do site">
            </div>
            <div class="form-group">
                <label for="inputautor">Autor do site</label>
                <input type="text" class="form-control" id="inputautor" name="inputautor" value="<?= $c->getAutor(); ?>" placeholder="Autor">
            </div>
            <div class="form-group">
                <label for="inputpalavraschave">Palavras chaves</label>
                <input type="text" class="form-control" id="inputpalavraschave" name="inputpalavraschave" value="<?= $c->getPalavra_chave(); ?>" placeholder="Palavra chave">
            </div>
            <div class="form-group">
                <label for="inputdescricao">Descrição</label>
                <textarea class="form-control" id="inputdescricao" name="inputdescricao" rows="3"><?= $c->getDescricao(); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>

</form>