/**
 *  Manipulação de eventos da aplicação 
 */ 
$(document).ready(function(){
    // Monitornando o evento de click no botão de login
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
});