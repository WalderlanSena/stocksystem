    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Editar dados do usúario</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formUser">
                        <input type="hidden" id="code" value="">
                        <input type="text" class="form-control input-lg btn-lg" placeholder="Digite o login do usuario" id="login2">
                        <br>                            
                        <input type="password" class="form-control input-lg btn-lg" placeholder="Digite a senha do usuario" id="senha2">
                        <br>
                        <button type="button" class="btn btn-danger btn-lg" id="updateUser"><span class="glyphicon glyphicon-plus-sign"></span> Atualizar dados do usúario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    
    
    <div class="container">
        <div class="row">
            <section class="col-md-12 animated bounce dados-table">
                <div class="panel panel-primary text-center">
                    <div class="panel panel-heading">
                        <header>
                            <h1>Cadastrar um novo Usúario</h1>
                        </header>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" id="formUser">
                            <input type="text" class="form-control input-lg btn-lg" placeholder="Digite o login do usuario" id="login">
                            <br>                            
                            <input type="password" class="form-control input-lg btn-lg" placeholder="Digite a senha do usuario" id="senha">
                            <br>
                            <div class="buttonCad">
                                <button type="button" class="btn btn-danger btn-lg" id="cadNewUsuario"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar novo usúario</button>
                            </div>
                        </form>
                    </div>
                </div>    
            </section>

            <section class="col-md-12 animated bounce dados-table">
                <div class="panel panel-primary text-center">
                    <div class="panel panel-heading">
                        <header>
                            <h1>Usuarios Cadastrados</h1>
                        </header>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="" method="post">
                                <input type="text" id="busca" class="form-control" placeholder="O que você procura?">
                            </form>
                            <br>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <th>Id</th>
                                    <th>Login</th>
                                    <th>Senha</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </thead>
                                <tbody id="usuariosCadastrados">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
            </section>
        </div>
    </div>