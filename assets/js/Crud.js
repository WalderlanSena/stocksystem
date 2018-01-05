
/**
 *  Insere um novo dado no localStorage 
 */ 
function insertData(dadosIn, key) 
{
    // Capturando os dados já existêntes no localStorage
    var dados = searchDataAll(key);
    // Inserindo os novos dados no array de dados existêntes
    dados.push(dadosIn);
    // Chamando a repassando os dados para a função que salva os dados no localStorage
    salveDataAll(dados, key);
    // Iniciando mensagem de sucesso
    alertify.success("Veículo cadastrado com <b>Sucesso !</b>");
}//end function insertData

/**
 *  Busca por todos os dados no localStorage 
 *  @return Array com os dados encontrados
 */ 
function searchDataAll(key) 
{    
    // Criando uma array vazio que receberar os dados do localStorage caso existam
    var dados = [];
    // Verificando a existência de daods
    if (localStorage.getItem(key)) {
        var stringDados = localStorage.getItem(key);
        dados = JSON.parse(stringDados);
    }

    return dados;
}//end function searchDataAll


/**
 *  Busca por um dado especifico no localStorage 
 *  @return Array com os dados encontrados
 */ 
function searchDataId(id, key)
{
    var dados = searchDataAll(key);

    return dados[id];
}//end searchDataId

/**
 *  Salva os dados recebidos no localStorage 
 */
function salveDataAll(dados, key) 
{
    // Converte os dados recebido em formato JSON
    var stringDados = JSON.stringify(dados);
    // Insere os dados no localStorage
    localStorage.setItem(key, stringDados);
}

/**
 *  Deleta todas as informação da key especificada 
 */ 
function deleteDataAll(key)
{
    localStorage.setItem(key, "[]");
}

// Deleta o veículo especificado
function deleteData(id, key)
{
    var dados = searchDataAll(key);

    dados[id] = undefined;

    salveDataAll(dados, key);

    $('#veiculo-'+id).remove();

    alertify.success("<p class='text-center'><span class='glyphicon glyphicon-ok-sign'></span> Veículo excluido com <b>Sucesso !</b></p>");
}

// Atualiza os dados da tabela em cada operação
function updateTable(key)
{
    var dados = searchDataAll(key);
    var table = $('#veiculosCadastrados');
    table.html('');

    for (var i in dados){
        if(dados[i] == null) {
            continue;
        }
        table.prepend(
            '<tr id="veiculo-'+i+'">'+
            '<td>'+dados[i].placa+'</td>'+
            '<td>'+dados[i].tipoDeVeiculo+'</td>'+
            '<td>'+dados[i].marca+'</td>'+
            '<td>'+dados[i].modelo+'</td>'+
            '<td>'+dados[i].modeloFipeId+'</td>'+
            '<td>'+dados[i].marcaFipeId+'</td>'+
            '<td>'+dados[i].anoMod+'</td>'+
            '<td>'+dados[i].anoFab+'</td>'+
            '<td>'+'<span id="'+i+'" class="glyphicon glyphicon-pencil editar"></span>'+'</td>'+
            '<td>'+'<span id="'+i+'" class="glyphicon glyphicon-trash excluir"></span>'+'</td>'+
            '</tr>'
        );
    }
}

// Atualiza um dado especificado
function updateData(dadosIn, id)
{
    var dados = searchDataAll("veiculos");

    dados[id] = dadosIn;

    salveDataAll(dados, "veiculos");

    alertify.success("<p class='text-center'><span class='glyphicon glyphicon-ok-sign'></span> Veículo atualizada com <b>Sucesso !</b></p>");
}