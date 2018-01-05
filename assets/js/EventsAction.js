/**
 *  Manipulação de eventos da aplicação 
 */ 
$(document).ready(function(){
    // ---------- Monitornando o evento de click no botão de login ---------
    $("#logar").click(function(){
        // Capturando os dados do formulario
        var login = $("#login").val();
        var senha = $("#senha").val();
        // Validando se os campos foram preenchidos
        if (login == '' || senha == '') {
            $(".form-signin").removeClass("bounceInDown");
            $(".form-signin").addClass("shake");
            // Notificação de erro 
            alertify.error("Ambos campos são obrigatórios");
        } else {
            // Capturando os dados dos usúarios cadastrados no localStoraje
            var adminCad   = localStorage.getItem("Database");
            // Covertendo os mesmos
            var dadosLogin = JSON.parse(adminCad);
            // Iniciando requisição ajax
            $.ajax({
                url: "/auth/login",
                type: "POST",
                data: {
                    login: login, 
                    senha: senha, 
                    logar: dadosLogin
                },
                dataType: "json",
                success:function(data) {
                    var msg = data['msg'];
                    /**
                     * Verificando o código de retorno
                     */
                    // Caso seja administrador
                    if (msg == "admin") {
                        $(location).attr("href", "/administrator");
                    // Caso seja um usúario comum
                    } else if (msg == "user") {
                        $(location).attr("href", "/painel");
                    // Caso a login ou a senha estejam incorretas
                    } else {
                       alertify.error(msg);
                    }//end if
                }
            });
        }//end if
    }); 

    // ---------- Atualizando dados da tabela ----------
    updateTable("veiculos");
    
    // ---------- Eventos Painel Administrativo ----------

    // ---------- Buscando por todas as marcas ---------
    $("#tipoVeiculo").change(function(){
        $("#marcaVeiculo").html("");
        var tipoDeVeiculo = $(this).val();
        if (tipoDeVeiculo != 0) {
            $.ajax({
                url: "https://fipeapi.appspot.com/api/1/"+tipoDeVeiculo+"/marcas.json",
                type: "GET",
                dataType: "json",
                success:function(result){
                    $("#marcaVeiculo").append("<option value>--- Selecione ---</option>");
                    for (var i = 0; i < result.length; i++) {
                        $("#marcaVeiculo").append('<option id="'+result[i].id+'"value="' + result[i].name + '">' + result[i].name + '</option>');
                    }
                }
            });
        }//end if
    });

    // --------- Capturando o modelo do veículo ---------
    $("#marcaVeiculo").change(function(){
        $("#modelosList").html("<option value>--- Selecione ---</option>");
        var tipoDeVeiculo = $("#tipoVeiculo").val();
        var id = $("#marcaVeiculo option:selected").attr("id");
        // Capturando modelos de veículos  
        $.ajax({
            url: "https://fipeapi.appspot.com/api/1/"+tipoDeVeiculo+"/veiculos/"+id+".json",
            type: "GET",
            dataType: "json",
            success:function(result){
                for (var i = 0; i < result.length; i++) {
                    $("#modelosList").append('<option id="'+result[i].id+'" value="' + result[i].name + '">' + result[i].name + '</option>');
                }
            }
        });
    });

    // Capturando modelo Fipe Id
    $("#modelosList").change(function(){
        var modFipeId = $("#modelosList option:selected").attr("id");
        $("#modeloFipeId").html('<option value="' + modFipeId + '">' + modFipeId + '</option>');
    });

    $("#marcaVeiculo").change(function(){
        var marFipeId = $("#marcaVeiculo option:selected").attr("id");
        $("#marcaFipeId").html('<option value="' + marFipeId + '">' + marFipeId + '</option>');
    });

    // Capturando o ano modelo e o ano de fabricação
    $("#modelosList").change(function(){
        $("#anoFab").html("<option value>--- Selecione ---</option>");        
        var idModelo      = $("#modelosList option:selected").attr("id");
        var idMarca       = $("#marcaVeiculo option:selected").attr("id");
        var tipoDeVeiculo = $("#marcaVeiculo").val();

        $.ajax({
        url: "https://fipeapi.appspot.com/api/1/"+tipoDeVeiculo+"/veiculo/"+idMarca+"/"+idModelo+".json",
        type: "GET",
        dataType: "json",
        success:function(result){
            for (var i = 0; i < result.length; i++) {
                    $("#anoFab").append('<option value="' + result[i].fipe_codigo + '">' + result[i].fipe_codigo.substring(4, 0) + '</option>');
                }
            }
        });
    });

    // Capturando ano modelo
    $("#anoFab").change(function(){
        $("#anoMod").html("<option value=''>--- Selecione ---</option>");   
        var tipoDeVeiculo = $("#marcaVeiculo").val();
        var idModelo      = $("#modelosList option:selected").attr("id");
        var idMarca       = $("#marcaVeiculo option:selected").attr("id");
        var ano           = $("#anoFab option:selected").val();
        
        $.ajax({
            url: "https://fipeapi.appspot.com/api/1/"+tipoDeVeiculo+"/veiculo/"+idMarca+"/"+idModelo+"/"+ano+".json",
            type: "GET",
            dataType: "json",
            success:function(result){
                $("#anoMod").append('<option value="' + result.ano_modelo + '">' + result.ano_modelo + '</option>');
            }
        });
    });

    /**
     *  Capturando e salvando os dados no localStorage
     */ 
    $("#cadnewVeiculo").click(function(){
        var placa         = $("#placa").val();
        var tipoDeVeiculo = $("#tipoVeiculo").val();
        var marca         = $("#marcaVeiculo").val();
        var modelo        = $("#modelosList").val();
        var modeloFipeId  = $("#modeloFipeId").val();
        var marcaFipeId   = $("#marcaFipeId").val();
        var anoFab        = $("#anoFab").val();
        var anoMod        = $("#anoMod").val();
        // Verificando se os campos foram todos preenchidos
        if (placa != '' && tipoDeVeiculo != '' && marca != '' && modelo != '' && modelo != '' && modeloFipeId != '' && marcaFipeId != '' && anoFab != '' && anoMod != '') {
           // Montando a estrutura com os dados
            var dados = {
                    placa:          $("#placa").val(),
                    tipoDeVeiculo:  $("#tipoVeiculo").val(),
                    marca:          $("#marcaVeiculo").val(),
                    modelo:         $("#modelosList").val(),
                    modeloFipeId:   $("#modeloFipeId").val(),
                    marcaFipeId:    $("#marcaFipeId").val(),
                    anoFab:         $("#anoFab").val(),
                    anoMod:         $("#anoMod").val()
                };
            /**
             * Chamando a função para inserir os dados
             * @param Dados a serem inseridos
             * @param Key LocalStorage respectivo a sua key   
             */
            insertData(dados, "veiculos");

            // Resetando campos do formulario
            $("#cadVeiculo").trigger('reset');
            
            /**
             *  Atualizando os dados da tabela caso os mesmos já existam
             *  @param Key referente ao LocalStorage
             */ 
            updateTable("veiculos");
        } else {
            alertify.error("<p class='text-center'><span class='glyphicon glyphicon-warning-sign'></span> Desculpe, todos os dados são <b>Obrigatórios !</b></p>");       
        }
    });

    $(".editar").click(function(){
        
        var id = this.id;

        var dados = searchDataId(id, "veiculos");
        
        $("#dado").val(id);
        $("#placa2").val(dados.placa);
        $("#tipoVeiculo2").val(dados.tipoDeVeiculo);
        $("#marcaVeiculo2").val(dados.marca);
        $("#modelosList2").val(dados.modelo);
        $("#modeloFipeId2").val(dados.modeloFipeId);
        $("#marcaFipeId2").val(dados.marcaFipeId);
        $("#anoFab2").val(dados.anoFab);
        $("#anoMod2").val(dados.anoMod);
        
        $("#myModal").modal();
        
    });

    $("#editarVeiculo").click(function(){
        var id            = $("#dado").val();
        var placa         = $("#placa2").val();
        var tipoDeVeiculo = $("#tipoVeiculo2").val();
        var marca         = $("#marcaVeiculo2").val();
        var modelo        = $("#modelosList2").val();
        var modeloFipeId  = $("#modeloFipeId2").val();
        var marcaFipeId   = $("#marcaFipeId2").val();
        var anoFab        = $("#anoFab2").val();
        var anoMod        = $("#anoMod2").val();
        // Verificando se os campos foram todos preenchidos
        if (placa != '' && tipoDeVeiculo != '' && marca != '' && modelo != '' && modelo != '' && modeloFipeId != '' && marcaFipeId != '' && anoFab != '' && anoMod != '') {
            // Montando a estrutura com os dados
             var dados = {
                     placa:          $("#placa2").val(),
                     tipoDeVeiculo:  $("#tipoVeiculo2").val(),
                     marca:          $("#marcaVeiculo2").val(),
                     modelo:         $("#modelosList2").val(),
                     modeloFipeId:   $("#modeloFipeId2").val(),
                     marcaFipeId:    $("#marcaFipeId2").val(),
                     anoFab:         $("#anoFab2").val(),
                     anoMod:         $("#anoMod2").val()
            };
            $("#myModal").modal('hide');
             /**
              * Chamando a função para inserir os dados
              * @param Dados a serem inseridos
              * @param Key LocalStorage respectivo a sua key   
              */
             updateData(dados, id);
 
             // Resetando campos do formulario
             $("#updateV").trigger('reset');
             
             /**
              *  Atualizando os dados da tabela caso os mesmos já existam
              *  @param Key referente ao LocalStorage
              */ 
             updateTable("veiculos");
         } else {
             alertify.error("<p class='text-center'><span class='glyphicon glyphicon-warning-sign'></span> Desculpe, todos os dados são <b>Obrigatórios !</b></p>");       
         }
    });

    $(".excluir").click(function(){
        var id = this.id;
        alertify.confirm("Deseja excluir o veículo?", function (e) {
            if (e) {
                deleteData(id, "veiculos");
            } else {
                alertify.log("<p class='text-center'><span class='glyphicon glyphicon-warning-sign'></span> Operação cancelada <b> :) </b></p>"); 
            }
        });
    });

    $('#busca').keyup( function () {
        var letras = $(this).val();
        $('#veiculosCadastrados tr').filter(function() {
            $(this).toggle($(this).text().indexOf(letras) > -1);
        });
    });

});
