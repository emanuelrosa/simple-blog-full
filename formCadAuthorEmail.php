w
<div class='col-md-12'>
    <form id="formaut" action="./assets/php/author.php" class="form form-horizontal">
        <h2>Novo cadastro de autor</h2>
        
        <div class="form-group">
            <label for="inputnome">Nome</label>
            <input type="text" class="form-control" id="inputnome" name="inputnome" placeholder="Nome completo" />
        </div>
        <div class="form-group">
            <label for="inputemail">E-mail</label>
            <input type="text" class="form-control" id="inputemail" name="inputemail" placeholder="Melhor e-mail"/>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group" style="padding-right: 5px;">
                    <label for="inputemail">Senha</label>
                    <input type="password" class="form-control" id="inputsenha" name="inputsenha" />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inputemail">Confirma Senha</label>
                    <input type="password" class="form-control" id="inputconfirmasenha" name="inputconfirmasenha" />
                </div>
            </div>
        </div>

        <div class="row">
            <div id="btnAdd" class="col-md-12">
                <button type="submit" class="btn btn-primary">Adicionar novo autor</button>
                <button id="btn-cancelcadaut" type="reset" class="btn btn-default btn-cancel">Cancelar</button>
            </div>
        </div>
    </form>
</div>