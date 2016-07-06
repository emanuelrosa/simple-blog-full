<?php
if (array_key_exists(1, $args)) {
    $idpost = $args[1];

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
        <h1 class="page-header">Postagens</h1>
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
                </div>

                <form id="formpost" action="./actions/blogPost.php">

                    <div id="d-autor" >
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select id="inputautor" class="form-control">
                                        <option value="">Selecione Autor</option>
                                        <?php
                                        $adao = new AutorDao();
                                        foreach ($adao->listAllAutorActives() as $row) {
                                            echo "<option value='" . $row['idautor'] . "'>" . $row['nome'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button id="btn-autor" class="btn btn-sm btn-primary">OK</button>
                            </div>
                        </div>
                    </div>

                    <div id="d-conteudo">
                        <input type="hidden" name="inputid" id="inputid" value="<?= (isset($post)) ? $post->getIdpost() : ""; ?>" />
                        <input type="hidden" name="inputidautor" id="inputidautor" value="<?= (isset($post)) ? $post->getIdautor() : ""; ?>" />
                        <div class='row'>
                            <div id="lbl-autor" class="col-md-8">
                                <?= (isset($post)) ? "autor: <b>" . $autor->getNome() . "</b>" : ""; ?>
                            </div>
                            <div class='col-md-4' align='right'>
                                <?php
                                if (isset($post)) {
                                    ?><a href="#" class="btn btn-default btn-voltar">Voltar</a><?php
                                }

                                if ($edit) {
                                    ?>
                                    <a href="<?= "http://$_SERVER[HTTP_HOST]/preview/" . $post->getLink() ?>" target="_blank" class="btn btn-default">Visualizar</a>
                                    <?php
                                }
                                ?>


                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class='col-md-8'>
                                <div class="form-group">
                                    <label for="inputtitulo">Título</label>
                                    <input type="text" class="form-control" id="inputtitulo" name="inputtitulo" placeholder="Título" value="<?= (isset($post)) ? $post->getTitulo() : ""; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputlink">Link Permanente</label>
                                    <input type="text" class="form-control" id="inputlink" name="inputlink" placeholder="Link de Acesso." value="<?= (isset($post)) ? $post->getLink() : ""; ?>">
                                    <p class="help-block">O "link permanente" é uma versão amigável do URL. Normalmente, é todo em minúsculas e contém apenas letras, números e hífens..</p>
                                </div>
                                <div class="form-group">
                                    <textarea rows='4' id="inputConteudo" name="inputConteudo"><?= (isset($post)) ? $post->getMateria() : ""; ?></textarea>
                                    <textarea style="display:none;" rows='4' id="inputCont" name="inputCont"><?= (isset($post)) ? $post->getMateria() : ""; ?></textarea>
                                    <script>
                                        CKEDITOR.replace('inputConteudo', {
                                            filebrowserBrowseUrl: './ckeditor/ckfinder/ckfinder.html',
                                            filebrowserImageBrowseUrl: './ckeditor/ckfinder/ckfinder.html?type=Images',
                                            filebrowserFlashBrowseUrl: './manage/ckeditor/ckfinder/ckfinder.html?type=Flash',
                                            filebrowserUploadUrl: './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                            filebrowserImageUploadUrl: './manage/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label for="inputresumo">Resumo</label>
                                    <textarea class="form-control" rows="5" id="inputresumo" name="inputresumo"><?= (isset($post)) ? $post->getResumo() : ""; ?></textarea>
                                    <p class="help-block">Resumo da postagem contendo no máximo <span id="rest">255</span> caracteres.</p>
                                </div>
                            </div>
                            <div class='col-md-4'>

                                <!-- Estado Postagem -->
                                <div class="panel-group" id="accordionEstado" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordionEstado" href="#collapseEstadoOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Liberar postagem
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseEstadoOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    Liberar postagem assim que publicada?
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="inputestado" id="inputestado" value="1" <?= (isset($post)) ? (($post->getEstado() === '1') ? "checked" : "" ) : ""; ?>> Sim
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="inputestado" id="inputestado" value="0" aria-label="..." <?= (isset($post)) ? (($post->getEstado() === '0') ? "checked" : "") : "checked"; ?>> Não
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                    foreach ($cdao->listActivesCategorias() as $row) {
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
                                                    <input type="hidden" id="inputeditimg" name="inputeditimg" value="N" >
                                                    <div class="image-upload" align='center'>
                                                        <label for="inputimg">
                                                            <?php
                                                            if (isset($post)) {
                                                                if (is_null($post->getImagem())) {
                                                                    $img = "default-ban.png";
                                                                } else {
                                                                    $img = $post->getImagem();
                                                                }
                                                            } else {
                                                                $img = "default-ban.png";
                                                            }
                                                            ?>
                                                            <img id="imgban" src="../../assets/images/ban_posts/<?= $img ?>" width="100%"/>

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
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-md-4 col-md-offset-8' align='right'>
                                <?php
                                if (isset($post)) {
                                    ?><a href="#" class="btn btn-default btn-voltar">Voltar</a><?php
                                }
                                
                                if ($edit) {
                                    ?>
                                    <a href="<?= "http://$_SERVER[HTTP_HOST]/preview/" . $post->getLink() ?>" target="_blank" class="btn btn-default">Visualizar</a>
                                    <?php
                                }
                                ?>
                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- JavaScript -->
<script src="../../assets/js/blogPost.js"></script>
