/**
 *  Inicializa o usúario administrativo caso o mesmo não esteja previamente cadastrado
 */ 
$(document).ready(function(){
    // Verifica se o usuario admin já está cadastrado
    if (localStorage.getItem("Database") == null) {
        // Dados de login do usuario administrativo
        var data = [
            {
                login: 'admin',
                senha: 'admin',
                nivel: 1
            }
        ];
        // Convertendo os dados armazenados
        var stringDados = JSON.stringify(data);
        // Setando os dados administrativos no localStorage
        localStorage.setItem("Database", stringDados);
    }//end if
});