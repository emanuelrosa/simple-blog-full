<form id="formconfig" action="./actions/config.php" method="post">
    <div class="form-group">
        <div class="col-md-12">

            <div class="form-group">
                <label for="inputFacebook">Facebook</label>
                <input type="text" class="form-control" id="inputFacebook" name="inputFacebook" value="" placeholder="Link Facebook">
            </div>
            <div class="form-group">
                <label for="inputTwitter">Twitter</label>
                <input type="text" class="form-control" id="inputTwitter" name="inputTwitter" value="" placeholder="Link Twitter">
            </div>
            <div class="form-group">
                <?php // O pediu para trocar de Google+ para msg de WhatsApp então para não mecher no banco so trocamos o que mostra para o cliente ?>
                <label for="inputGoogle">Mensagem WhatsApp</label>
                <input type="text" class="form-control" id="inputGoogle" name="inputGoogle" value="" placeholder="Msg WhatsApp">
            </div>
            <div class="form-group">
                <label for="inputPinit">Youtube</label>
                <input type="text" class="form-control" id="inputYoutube" name="inputYoutube" value="" placeholder="Link Youtube">
            </div>
            <div class="form-group">
                <label for="inputPinit">Instagram</label>
                <input type="text" class="form-control" id="inputInstagram" name="inputInstagram" value="" placeholder="Link Instagram">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>

</form>