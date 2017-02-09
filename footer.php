        <footer>
            <!-- Error site modal -->
            <div class="modal fade" id="errorSiteModal" tabindex="-1" role="dialog" aria-labelledby="errorSiteModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="error-form" action="assets/php/error.php" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Erro no site?</h4>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Desculpe-nos pelo encomodo, mas ainda estamos em constante processo de melhoramento do sistema, as vezes, alguns erros podem passar despercebidos, por isso precisamos de sua ajuda para nos dizer o que aconteceu, envie para nós.<br><br> Obrigado.</p>
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
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Login Author modal -->
            <div class="modal fade" id="logincolaborador" tabindex="-1" role="dialog" aria-labelledby="logincolaborador">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <div class='row'>
                                <div class='row'>
                                    <div class="col-md-12">
                                        <div class="alert alert-info loadingcreateuser">
                                            <span class="fa fa-spinner fa-2x fa-spin"></span> &nbsp;&nbsp;&nbsp;<b>Carregando, aguarde...</b>
                                        </div>
                                        <div id="msgauthor"></div>
                                    </div>
                                </div>

                                <div id="form-login">
                                    <div class="col-md-6">
                                        <h3> ENTRAR </h3>
                                        <hr>

                                        <div id="btn-login-face"><a href="#" class="btn btn-primary" style="width: 100%" onclick="myFacebookLogin()"><span class="fa fa-facebook"></span> &nbsp;&nbsp;|&nbsp;&nbsp;Login via Facebook</a></div>

                                        <hr>
                                        <label>USE SEU ENDEREÇO DE EMAIL</label>
                                        <form id="loginauthor" action="author/action/authors.php" method="post" >
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="inputemail" name="inputemail" placeholder="email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="inputsenha" name="inputsenha" placeholder="Senha">
                                            </div>
                                            <button type="submit" class="btn btn-warning">Login via Email</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Nova conta</h3>
                                        <hr>
                                        Para criar uma conta com o facebook <br>
                                        <button class="btn btn-primary" style="width: 100%" onclick="createUserByFacebook()"><span class="fa fa-facebook"></span> &nbsp;&nbsp;|&nbsp;&nbsp;CRIAR CONTA VIA FACEBOOK</button>
                                        <hr><br>
                                        Para criar uma conta com seu email, clique no botão a baixo e preencha com seus dados pessoais.
                                        <br>
                                        <button id="btn-novoautor" class="btn btn-warning" style="width: 100%"><span class="fa fa-plus"></span> &nbsp;&nbsp;|&nbsp;&nbsp;CRIAR NOVA CONTA</button>

                                    </div>
                                </div>
                                <div id="form-cad">
                                    <?php include "./formCadAuthorEmail.php"; ?>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <a href="<?= $actual_site ?>/about" title="" >Sobre o site</a> | 
                    <a href="<?= $actual_site ?>/terms" title="" >Termos de uso</a> | 
                    <a href="<?= $actual_site ?>/privacy" title="" >Politica de privacidade</a> |
                    <a id="btn-loginauthor" href="#" title="Seja um colaborador" >Seja um colaborador</a> |
                    <a href="#" title="Mensagem de error" data-toggle="modal" data-target="#errorSiteModal" >Encontrou algum erro?</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <p>Copyright &copy; <?= $actual_ano ?> 2016 - Todos os direitos reservados.</p>
                </div>
                <div class="col-lg-5" align='right'>
                    <p>Por <a href="http://www.mfagencia.com.br" title="">MF Agência</a></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>