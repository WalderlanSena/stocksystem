<?php
/**
 *  Controllers Base da aplicação 
 *  @author Walderlan Sena - <eu@walderlan.xyz> - 2018
 *  @license https://github.com/WalderlanSena/stocksystem/blob/master/LICENSE
 *  @version v1.0.0  
 * 
 */ 
namespace Core;

class Controller
{
    private $action; 
    /**
     *  Método que renderiza a view solicitada
     *  @param Action que deseja renderizar
     */ 
    public function render($action)
    {
        $this->action = $action;
        // Verifica se o template padrão existe e inclui o mesmo
        if (file_exists(__DIR__."/../app/Views/templates/layout.php")) {
            include_once(__DIR__."/../app/Views/templates/layout.php");
            // $this->content($action);
        } else {
            echo "Erro: Desculpe, não foi possivel carregar a página, contate o Administrador...";
        }
    }//end render
    
    /**
     *  Inclui o conteudo da view na página
     */
    public function content()
    {
        // include_once '../app/Views/'.$filterFolder.'/'.$this->action.'.php';
        if (file_exists(__DIR__."/../app/Views/".$this->action.".php"))
            include_once __DIR__."/../app/Views/".$this->action.".php";
    }
}//end Controller