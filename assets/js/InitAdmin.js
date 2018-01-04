/**
 *  Inicializa o usúario administrativo caso o mesmo não esteja previamente cadastrado
 */ 
$(document).ready(function(){
    // Verifica se o usuario admin já está cadastrado
    if (localStorage.getItem("Database") == null) {
        // Dados de login do usuario administrativo
        var data = [
            {
                id: 1,
                login: 'admin',
                senha: '$2y$10$D73ponNVCLuhRcOmMuMx..PJr0injZTfzKKKG3bzQaLPM432Hmf8m',
                nivel: 1
            }
        ];
        // Convertendo os dados armazenados
        var stringDados = JSON.stringify(data);
        // Setando os dados administrativos no localStorage
        localStorage.setItem("Database", stringDados);
    }//end if
});