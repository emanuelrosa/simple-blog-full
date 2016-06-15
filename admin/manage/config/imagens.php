<form id="formconfig" action="./actions/config.php" method="post">
    <div class="form-group">
        <div class='row'>
            <div class='col-md-6'>
                <div id="img"></div>
                <div id="fileimg" class="form-group">
                    <label for="inputimagem">Logo site</label>
                    <input type="hidden" id="inputeditimg" name="inputeditimg" value="N" >
                    <div class="image-upload" align='center'>
                        <label for="inputimg">
                            <img id="imgban" src="../../assets/images/logo/logo150x55.png" width="100%"/>
                        </label>

                        <input type="file" accept="image/*" name="inputimg" id="inputimg" value="" />
                    </div>
                    <!-- preview image ban-->
                    <div id="previewimgban">
                        <div id="previewimg-row" class="previewimg"  align='center'>
                            <img src="#" id="previewimg" width="100%" >
                        </div>
                    </div>
                    <div><button id="btn-removerimg" class="btn btn-sm btn-danger">Remover imagem</button></div>

                </div>
            </div>
            <div class='col-md-6'>
                <div id="img"></div>
                <div id="fileimg" class="form-group">
                    <label for="inputimagem">Escolha a imagem Painel Admin</label>
                    <input type="hidden" id="inputeditimg" name="inputeditimg" value="N" >
                    <div class="image-upload" align='center'>
                        <label for="inputimg">
                            <img id="imgban" src="../../assets/images/logo/logotopadmin.png" width="100%"/>
                        </label>

                        <input type="file" accept="image/*" name="inputimg" id="inputimg" value="" />
                    </div>
                    <!-- preview image ban-->
                    <div id="previewimgban">
                        <div id="previewimg-row" class="previewimg"  align='center'>
                            <img src="#" id="previewimg" width="100%" >
                        </div>
                    </div>
                    <div><button id="btn-removerimg" class="btn btn-sm btn-danger">Remover imagem</button></div>

                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-6'>
                <div id="img"></div>
                <div id="fileimg" class="form-group">
                    <label for="inputimagem">Banner divulgação site</label>
                    <input type="hidden" id="inputeditimg" name="inputeditimg" value="N" >
                    <div class="image-upload" align='center'>
                        <label for="inputimg">
                            <img id="imgban" src="../../../assets/images/img-face.jpg" width="100%"/>
                        </label>

                        <input type="file" accept="image/*" name="inputimg" id="inputimg" value="" />
                    </div>
                    <!-- preview image ban-->
                    <div id="previewimgban">
                        <div id="previewimg-row" class="previewimg"  align='center'>
                            <img src="#" id="previewimg" width="100%" >
                        </div>
                    </div>
                    <div><button id="btn-removerimg" class="btn btn-sm btn-danger">Remover imagem</button></div>

                </div>
            </div>
            <div class='col-md-6'>
                <div id="img"></div>
                <div id="fileimg" class="form-group">
                    <label for="inputimagem">GIF loading</label>
                    <input type="hidden" id="inputeditimg" name="inputeditimg" value="N" >
                    <div class="image-upload" align='center'>
                        <label for="inputimg">
                            <img id="imgban" src="../../../assets/images/preloader.gif" width="100%"/>
                        </label>

                        <input type="file" accept="image/*" name="inputimg" id="inputimg" value="" />
                    </div>
                    <!-- preview image ban-->
                    <div id="previewimgban">
                        <div id="previewimg-row" class="previewimg"  align='center'>
                            <img src="#" id="previewimg" width="100%" >
                        </div>
                    </div>
                    <div><button id="btn-removerimg" class="btn btn-sm btn-danger">Remover imagem</button></div>

                </div>
            </div>
        </div>
    </div>

</form>