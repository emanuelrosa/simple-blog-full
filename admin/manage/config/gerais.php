
<form id="formconfig" action="./actions/config.php" method="post">
    <div class="form-group">
        <div class="col-md-12">
            <div class="form-group">
                <label for="inputtitulo">Título do site</label>
                <input type="text" class="form-control" id="inputtitulo" name="inputtitulo" placeholder="Titulo do site">
            </div>
            <div class="form-group">
                <label for="inputautor">Autor do site</label>
                <input type="text" class="form-control" id="inputautor" name="inputautor" placeholder="Autor">
            </div>
            <div class="form-group">
                <label for="inputpalavraschave">Plavras chaves</label>
                <input type="text" class="form-control" id="inputpalavraschave" name="inputpalavraschave" placeholder="Palavra chave">
            </div>
            <div class="form-group">
                <label for="inputdescricao">Descrição</label>
                <textarea class="form-control" id="inputdescricao" name="inputdescricao" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>

</form>