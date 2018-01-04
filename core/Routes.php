<?php
/**
 *  Classe de definição das rotas bases da aplicação
 *  @author Walderlan Sena - <eu@walderlan.xyz> - 2018
 *  @license https://github.com/WalderlanSena/stocksystem/blob/master/LICENSE
 *  @version v1.0.0  
 * 
 */ 
namespace Core;

use Core\Bootstrap;

class Routes extends Bootstrap 
{
    /**
     *  Sobscreve o método da classe pai
     */ 
    protected function initRoutes()
    {
        $route[] = array("/", "IndexController", "indexAction");
        
        $route[] = array("/auth/login", "IndexController", "loginAction");
        $route[] = array("/auth/logout", "IndexController", "logoutAction");
       
        $route[] = array("/administrator", "UserController", "adminAction");
        $route[] = array("/painel", "UserController", "painelAction");

        $this->setRoutes($route);
    }//end método initRoutes

    
}//end Routes