<div class="row">
    <div class="col-md-12">
        <h2>Contatos</h2>
        <p>
            Sua opiniao é muito importante para nós, não deixe de entrar de enviar
            sua opinião sobre nosso conteúdo.<br>
            Basta preencher o formulário e enviar é rapidinho.
        </p>

        <form id="contact-form" action="assets/php/contact.php" >
            <div class="row">
                <div class="col-md-12">
                    <div class="loading alert alert-info">
                        <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                        <span class="sr-only">Loading...</span> Estamos enviando sua mensagem...
                    </div>
                </div>
                <div class="col-md-12 ajax-response"></div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputnome">Nome</label>
                        <input type="text" class="form-control" id="inputnome" name="inputnome">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control" id="inputemail" name="inputemail">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="inputmsg">Mensagem</label>
                    <textarea class="form-control" id="inputmsg" name="inputmsg" rows="5" ></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px;" align="right">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>

        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2>Redes Sociais</h2>
        <div class="social-share">

            <?php
            $s = new Social();
            $sdao = new SocialDao();

            $s = $sdao->getSocial();

            if ($s->getFacebook() !== "") {
                echo "<a href='" . $s->getFacebook() . "' target='_blank' class='azm-social azm-size-48 azm-r-square azm-facebook'><i class='fa fa-facebook-square fa-3x'></i></a> ";
            }

            if ($s->getWhatsapp() !== "") {
                echo "<a href=\"whatsapp://send?text='" . $s->getWhatsapp() . "'\" class='azm-social azm-size-48 azm-r-square azm-whatsapp'><i class='fa fa-whatsapp fa-3x'></i></a>";
            }
            if ($s->getTwitter() !== "") {
                echo "<a href='" . $s->getTwitter() . "' target='_blank' class='azm-social azm-size-48 azm-r-square azm-twitter'><i class='fa fa-twitter-square fa-3x'></i></a>";
            }
            if ($s->getGoogle() !== "") {
                echo "<a href='" . $s->getGoogle() . "' title='Google Plus' target='_blank' class='azm-social azm-size-48 azm-r-square azm-google-plus'><i class='fa fa-google-plus-square fa-3x'></i></a>";
            }
            if ($s->getPinterest() !== "") {
                echo "<a href='" . $s->getPinterest() . "' title='Pin it' target='_blank' class='azm-social azm-size-48 azm-r-square azm-pinterest'><i class='fa fa-pinterest-square fa-3x'></i></a>";
            }
            if ($s->getYoutube() !== "") {
                echo "<a href='" . $s->getPinterest() . "' title='Canal Youtube' target='_blank' class='azm-social azm-size-48 azm-r-square azm-pinterest'><i class='fa fa-youtube-square fa-3x'></i></a>";
            }
            ?>

        </div>
    </div>
</div>