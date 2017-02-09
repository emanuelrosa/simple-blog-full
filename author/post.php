        <?php
        if (array_key_exists(0, $args)) {
            $idpost = $args[0];

            $post = new Post();
            $pdao = new PostDao();

            $post = $pdao->getPost($idpost);

            $autor = new Autor();
            $adao = new AutorDao();

            $autor = $adao->getAutorById($post->getIdautor());

            $cat = new Categoria();
            $cdao = new CategoriaDao();

            $edit = true;
        } else {
            $edit = false;
        }
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Postagens</h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class='row'>
            <div class='col-sm-12'>
                <div class="panel panel-primary">
                    <div class="panel-heading">Adicionar nova postagem</div>
                    <div class="panel-body">
                        <div class="row">
                            <div id="error-msg" class="col-md-12"></div>
                            <div id="load" class="col-md-12">
                                <div class="alert alert-info">
                                    <span class="fa fa-spinner fa-2x fa-spin"></span> &nbsp;&nbsp;&nbsp;<b>Salvando...</b>
                                </div>
                            </div>
                        </div>

                        <form id="formpost" action="./action/authors.php">

                            <div id="d-conteudo">
                                <input type="hidden" name="inputidautor" id="inputidautor" value="<?= $a->getIdautor() ?>" />
                                <input type="hidden" name="inputid" id="inputid" value="<?= (isset($post)) ? $post->getIdpost() : ""; ?>" />
                                <input type="hidden" id="inputlink" name="inputlink" value="<?= (isset($post)) ? $post->getLink() : ""; ?>">
                                <input type="hidden" id="inputestado" name="inputestado" value="0">
                                <div class='row'>
                                    <div id="lbl-autor" class="col-md-4">
                                        <?= "autor: <b>" . $a->getNome() . "</b>"; ?>
                                    </div>
                                    <div class='col-md-8' align='right'>
                                        <?php
                                        if (isset($post)) {
                                            ?><a href="#" class="btn btn-default btn-voltar">Voltar</a><?php
                                        }
                                        ?>
                                        <button class="btn btn-info btn-visualizar" disabled="disabled">Pré visualizar</button>
                                        <button class="btn btn-primary btn-salvar">Guardar o rascunho</button>
                                        <button type="submit" class="btn btn-success">Enviar para avaliação</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class='col-md-8'>
                                        <div class="form-group">
                                            <label for="inputtitulo">Título</label>
                                            <input type="text" class="form-control" id="inputtitulo" name="inputtitulo" placeholder="Título" value="<?= (isset($post)) ? $post->getTitulo() : ""; ?>">
                                            <p class="help-block alerttitulo">Título da postagem contendo no máximo <span id="rest-titulo">50</span> caracteres.</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputresumo">Resumo</label>
                                            <textarea class="form-control" rows="3" id="inputresumo" name="inputresumo"><?= (isset($post)) ? $post->getResumo() : ""; ?></textarea>
                                            <p class="help-block alertresumo">Resumo da postagem contendo no máximo <span id="rest">220</span> caracteres.</p>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows='4' id="inputConteudo" name="inputConteudo"><?= (isset($post)) ? $post->getMateria() : ""; ?></textarea>
                                            <textarea style="display:none;" rows='4' id="inputCont" name="inputCont"><?= (isset($post)) ? $post->getMateria() : ""; ?></textarea>
                                            <script>
                                                CKEDITOR.replace('inputConteudo', {
                                                    toolbar: [['Bold', 'Italic'], ['Link', 'Unlink'], ['Format'], ['BulletedList'], ['Undo', 'Redo'], ['oembed']],
                                                    uiColor: '#EFF0FC'
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>

                                        <!-- Categoria -->
                                        <div class="panel-group" id="accordionCategoria" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordionCategoria" href="#collapseCategoriaOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Categorias
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseCategoriaOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <select class="form-control" id="selectCategoria" name="selectCategoria">
                                                            <option value="">Selecione Categoria</option>
                                                            <?php
                                                            $cdao = new CategoriaDao();
                                                            foreach ($cdao->listAllCategorias() as $row) {
                                                                echo '<option value="' . $row['idcategoria'] . '"  ' . ((isset($post)) ? (($post->getIdcategoria() === $row['idcategoria']) ? "SELECTED" : "" ) : "" ) . '>' . $row['nome'] . '</option>';

                                                                //lista subcategorias
                                                                $cdao = new CategoriaDao();
                                                                foreach ($cdao->listActivesSubcategorias($row['idcategoria']) as $row1) {
                                                                    echo '<option value="' . $row1['idcategoria'] . '" ' . ((isset($post)) ? (($post->getIdcategoria() === $row1['idcategoria']) ? "SELECTED" : "" ) : "" ) . '>&nbsp;&nbsp;&nbsp;' . $row1['nome'] . '</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Banner Imagem -->
                                        <div class="panel-group" id="accordionImagem" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordionImagem" href="#collapseImagemOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Banner divulgação
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseImagemOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <div id="img"></div>
                                                        <div id="fileimg" class="form-group">
                                                            <label for="inputimagem">Escolha a imagem</label>
                                                            <div class="image-upload" align='center'>
                                                                <label for="inputimg">
                                                                    <?php
                                                                    if (isset($post)) {
                                                                        if (is_null($post->getImagem()) || $post->getImagem() == "") {
                                                                            $img = "default-ban.png";
                                                                            $editimg = "N";
                                                                        } else {
                                                                            $img = $post->getImagem();
                                                                            $editimg = "S";
                                                                        }
                                                                    } else {
                                                                        $img = "default-ban.png";
                                                                        $editimg = "N";
                                                                    }
                                                                    ?>
                                                                    <input type="hidden" id="inputeditimg" name="inputeditimg" value="<?= $editimg ?>" >

                                                                    <img id="imgban" src="../assets/images/ban_posts/<?= $img ?>" width="100%"/>

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
                                        </div>

                                        <!--Ativar comentários-->
                                        <div class="panel-group" id="accordionComentario" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordionComentario" href="#collapseComentarioOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Aceitar Comentário
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseComentarioOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">

                                                        <div class="form-group">
                                                            Adicionar comentários do Facebook?
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="inputcomentario" id="inputcomentario" value="1" <?= (isset($post)) ? (($post->getComentario() === '1') ? "checked" : "" ) : "checked"; ?>> Sim
                                                                </label>
                                                            </div>
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="inputcomentario" id="inputcomentario" value="0" aria-label="..." <?= (isset($post)) ? (($post->getComentario() === '0') ? "checked" : "" ) : ""; ?>> Não
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tag's -->
                                        <div class="panel-group" id="accordionTag" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordionTag" href="#collapseTagOne" aria-expanded="true" aria-controls="collapseOne">
                                                            TAG's
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTagOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <input type="text" class="form-control" id="inputtags" name="inputtags" placeholder="Tag's" value="<?= (isset($post)) ? $post->getTags() : ""; ?>">
                                                        <p class="help-block-tag">Ex: <b>UFC,MMA,Jiu jitsu</b> use palavras separadas por vírgula.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class='row'>
                                    <div class='col-md-8 col-md-offset-4' align='right'>
                                        <?php
                                        if (isset($post)) {
                                            ?><a href="#" class="btn btn-default btn-voltar">Voltar</a><?php
                                        }
                                        ?>
                                        <button class="btn btn-info btn-visualizar" disabled="disabled">Pré visualizar</button>
                                        <button class="btn btn-primary btn-salvar">Guardar o rascunho</button>
                                        <button type="submit" class="btn btn-success">Enviar para avaliação</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

