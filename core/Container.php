<?php
/**
 *  Classe para dependency injection, realiza rotinas comuns na aplicação
 *  @author Walderlan Sena - <eu@walderlan.xyz> - 2018
 *  @license https://github.com/WalderlanSena/stocksystem/blob/master/LICENSE
 *  @version v1.0.0  
 * 
 */ 
namespace Core;

abstract class Container
{
    /**
     *  @return Instancia de um controller 
     */ 
    public static function newController($controller)
    {
        $objController = "\App\\Controllers\\".$controller;
        return new $objController;
    }//end newController

    /**
     *  Método que retora página de erro 404 da aplicação
     */ 
    public static function pageNotFound()
    {
        if (file_exists("app/Views/errors/404.php"))
            return require_once "app/Views/errors/404.php";
        else
            echo "Erro: Página não encontrada...";
    }//end pageNotFound
}//end Container