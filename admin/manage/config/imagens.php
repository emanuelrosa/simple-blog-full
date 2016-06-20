<?php
$imglogo = "default_logo.png";
if ($c->getImglogo() != "") {
    $imglogo = $c->getImglogo();
}

$imgPainelAdm = "default_adm.png";
if ($c->getImglogoadmin() != "") {
    $imgPainelAdm = $c->getImglogoadmin();
}

$imgBannerFacebook = "default_ban.png";
if ($c->getImgsocial() != "") {
    $imgBannerFacebook = $c->getImgsocial();
}

$imgGif = "default_gif.png";
if ($c->getGifload() != "") {
    $imgGif = $c->getGifload();
}
?>

<form id="formconfigimg" action="./actions/config.php" method="post">
    <div class="form-group">
        <div class='row' style="margin-top: 20px;">
            <div class='col-md-6'>
                
                <div id="fileimglogo" class="form-group">
                    <label for="inputimagem">Logo site</label>
                    <div class="image-upload" align='center'>
                        <label for="inputimglogo">
                            <img id="imgimglogo" src="../../assets/images/config_img/<?= $imglogo; ?>" width="100%"/>
                        </label>

                        <input type="file" accept="image/*" name="inputimglogo" id="inputimglogo" value=""  />
                    </div>

                    <!-- preview image logo-->
                    <div id="previewimglogo">
                        <div id="previewimg-row" class="previewimg"  align='center'>
                            <img src="#" id="previewimg" width="150" >
                        </div>
                    </div>
                    <p class="help-block">Somente imagens nas dimensões 150x55.</p>
                    <div><button id="btn-removerimglogo" class="btn btn-sm btn-danger">Remover imagem</button></div>

                </div>
            </div>
            <!-- ./configurar imagem logo -->

            <div class='col-md-6'>
                
                <div id="fileimgadm" class="form-group">
                    <label for="inputimagem">Escolha imagem painel admin</label>
                    <div class="image-upload" align='center'>
                        <label for="inputimgadm">
                            <img id="imgimgadm" src="../../assets/images/config_img/<?= $imgPainelAdm; ?>" width="100%"/>
                        </label>

                        <input type="file" accept="image/*" name="inputimgadm" id="inputimgadm" value=""  />
                    </div>

                    <!-- preview image logo-->
                    <div id="previewimgpaineladimin">
                        <div id="previewimg-row" class="previewimg"  align='center'>
                            <img src="#" id="previewimg" width="200" >
                        </div>
                    </div>
                    <p class="help-block">Somente imagens nas dimensões 200x36.</p>
                    <div><button id="btn-removerimgadm" class="btn btn-sm btn-danger">Remover imagem</button></div>

                </div>
            </div>
            <!-- ./configurar imagem área admin -->
        </div>
        <div class='row'>
            <div class='col-md-6'>
                
                <div id="fileimgban" class="form-group">
                    <label for="inputimagem">Banner de divulgação site</label>
                    <div class="image-upload" align='center'>
                        <label for="inputimgban">
                            <img id="imgimgban" src="../../assets/images/config_img/<?= $imgBannerFacebook; ?>" width="100%"/>
                        </label>

                        <input type="file" accept="image/*" name="inputimgban" id="inputimgban" value=""  />
                    </div>

                    <!-- preview image -->
                    <div id="previewimgban">
                        <div id="previewimg-row" class="previewimg"  align='center'>
                            <img src="#" id="previewimg" width="100%" >
                        </div>
                    </div>
                    <p class="help-block">Somente imagens nas dimensões 1200x628.<br>
                        Esta imagem é  utilizada ao compartilhar o site.</p>
                    <div><button id="btn-removerimgban" class="btn btn-sm btn-danger">Remover imagem</button></div>

                </div>
            </div>
            <!-- ./configurar imagem banner divulgacao site -->
            <div class='col-md-6'>
                
                <div id="fileimggif" class="form-group">
                    <label for="inputimagem">Gif prelooading de página</label>
                    <div class="image-upload" align='center'>
                        <label for="inputimggif">
                            <img id="imgimggif" src="../../assets/images/config_img/<?= $imgGif; ?>" width="100"/>
                        </label>

                        <input type="file" accept="image/*" name="inputimggif" id="inputimggif" value=""  />
                    </div>

                    <!-- preview image -->
                    <div id="previewimggif">
                        <div id="previewimg-row" class="previewimg"  align='center'>
                            <img src="#" id="previewimg" width="100" >
                        </div>
                    </div>
                    <p class="help-block">Adivione .gif com fundo transparente.<br>
                        Para não aparecer animação de entrada deixe sem animação.</p>
                    <div><button id="btn-removerimggif" class="btn btn-sm btn-danger">Remover imagem</button></div>

                </div>
            </div>
            <!-- ./configurar imagem preloader -->
        </div>
    </div>

</form>