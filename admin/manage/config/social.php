<?php
$s = new Social();
$sdao = new SocialDao();

$s = $sdao->getSocial();
?>
<form id="formsocial" action="./actions/config.php" method="post">
    <div class="form-group">
        <div class="col-md-12">

            <div class="form-group">
                <label for="inputFacebook">Facebook</label>
                <input type="text" class="form-control" id="inputFacebook" name="inputFacebook" value="<?= $s->getFacebook(); ?>" placeholder="Link Facebook">
            </div>
            <div class="form-group">
                <label for="inputTwitter">Twitter</label>
                <input type="text" class="form-control" id="inputTwitter" name="inputTwitter" value="<?= $s->getTwitter(); ?>" placeholder="Link Twitter">
            </div>
            <div class="form-group">
                <?php // O pediu para trocar de Google+ para msg de WhatsApp então para não mecher no banco so trocamos o que mostra para o cliente ?>
                <label for="inputWhatsapp">Mensagem WhatsApp</label>
                <input type="text" class="form-control" id="inputWhatsapp" name="inputWhatsapp" value="<?= $s->getWhatsapp(); ?>" placeholder="Msg WhatsApp">
            </div>
            <div class="form-group">
                <label for="inputYoutube">Youtube</label>
                <input type="text" class="form-control" id="inputYoutube" name="inputYoutube" value="<?= $s->getYoutube(); ?>" placeholder="Link Youtube">
            </div>
            <div class="form-group">
                <label for="inputInstagram">Instagram</label>
                <input type="text" class="form-control" id="inputInstagram" name="inputInstagram" value="<?= $s->getInstagram(); ?>" placeholder="Link Instagram">
            </div>
            <div class="form-group">
                <label for="inputGoogle">Google +</label>
                <input type="text" class="form-control" id="inputGoogle" name="inputGoogle" value="<?= $s->getGoogle(); ?>" placeholder="Link Google+">
            </div>
            <div class="form-group">
                <label for="inputPinterest">Pinterest</label>
                <input type="text" class="form-control" id="inputPinterest" name="inputPinterest" value="<?= $s->getPinterest(); ?>" placeholder="Link Pinterest">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>

</form>