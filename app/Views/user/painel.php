    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Editar dados do Veículo</h4>
                </div>
            <div class="modal-body">
                <form id="updateV" action="" method="post">
                    
                    <label>Placa</label>
                    <input type="text" class="form-control" placeholder="Digite a placa do Veículo" id="placa2">
                    
                    <label>Tipo de Veículo</label>
                    
                    <input type="text" class="form-control" placeholder="Digite o tipo de Veículo" id="tipoVeiculo2">

                    <label>Marca do Veículo</label>
                    
                    <input type="text" class="form-control" placeholder="Digite o tipo de Veículo" id="marcaVeiculo2">

                    <label>Modelo do Veículo</label>                    
                    <input type="text" class="form-control" placeholder="Digite o modelo do Veículo" id="modelosList2">

                    <label>Modelo Fipe Id</label>                    
                    <input type="text" class="form-control" placeholder="Digite o modelo fipe id" id="modeloFipeId2">

                    <label>Marca Fipe Id</label>                    
                    <input type="text" class="form-control" placeholder="Digite o marca fipe id" id="marcaFipeId2">

                    <label>Ano de Fabricação</label>                    
                    <input type="text" class="form-control" placeholder="Digite o ano de fabricação" id="anoFab2">

                    <input type="hidden" id="dado" value="">

                    <label>Ano do Modelo</label>                    
                    <input type="text" class="form-control" placeholder="Digite o ano do modelo" id="anoMod2">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-success" id="editarVeiculo">Atualizar Veículo</button>    
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="back-operation">
                <section class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">
                            <header>
                                <h1 class="text-center">Cadastrar novo Veículo</h1>
                            </header>
                        </div>
                        <div class="panel-body">
                            <form id="cadVeiculo" action="" method="post">
                                <div class="col-xs-12">
                                    <div class="col-md-4">
                                        <legend>Placa de Veículo</legend>
                                        <input type="text" id="placa" class="form-control" placeholder="Digite a placa do Veículo">
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <legend>Tipo de Veículo</legend>
                                        <select name="tipo" class="form-control text-center" id="tipoVeiculo">
                                            <option value>==== Selecione o tipo de Veículo ====</option>
                                            <option value="carros">Carro</option>
                                            <option value="motos">Moto</option>
                                            <option value="caminhoes">Caminhão</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <legend>Marca de Veículo</legend>
                                        <select name="marcaList" class="form-control text-center" id="marcaVeiculo">
                                            <option value>==== Selecione o Marca do Veículo ====</option>
                                        </select>
                                    </div>
                                </div><!-- end col-xs-12 -->
                                <br>
                                <br>
                                <div class="col-xs-12">
                                    <div class="col-md-4">
                                        <legend>Modelo do Veículo</legend>
                                        <select name="modelosVeiculo" class="form-control text-center" id="modelosList">
                                            <option value>==== Selecione o Modelo ====</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <legend>Modelo Fipe ID</legend>
                                        <select name="modelosFipeId" class="form-control text-center" id="modeloFipeId" disabled>
                                            <option value="0">==== Modelo Fipe Id ====</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <legend>Marca Fipe ID</legend>
                                        <select name="marcaFipeId" class="form-control text-center" id="marcaFipeId" disabled>
                                            <option value="0">==== Marca Fipe Id ====</option>
                                        </select>
                                    </div>
                                </div><!-- end col-xs-12 -->

                                <div class="col-xs-12">
                                    <div class="col-md-4">
                                        <legend>Ano Fabricação</legend>
                                        <select name="anoFab" class="form-control text-center" id="anoFab">
                                            <option value="0">==== Ano de Fabrição ====</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <legend>Ano Modelo</legend>
                                        <select name="anoMod" class="form-control text-center" id="anoMod">
                                            <option value="">==== Ano de Modelo ====</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <legend>Finalizar e Cadastrar:</legend>
                                        <button type="button" class="btn btn-danger" id="cadnewVeiculo"><span class="glyphicon glyphicon-plus-sign"></span> Cadastrar novo Veículo</button>
                                    </div>
                                </div><!-- end col-xs-12 -->
                            </form>
                        </div><!-- end panel-body -->
                    </div><!-- end panel -->
                </section>

                <section class="col-md-12 dados-table">
                    <div class="panel panel-primary text-center">
                        <div class="panel panel-heading">
                            <header>
                                <h1>Veículos Cadastrados</h1>
                            </header>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <th>Placa</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Modelo_FIPE_id</th>
                                        <th>Marca_FIPE_id</th>
                                        <th>Ano Modelo</th>
                                        <th>Ano Fabricaçao</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </thead>
                                    <tbody id="veiculosCadastrados">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </section>

            </div>


        </div>
    </div>