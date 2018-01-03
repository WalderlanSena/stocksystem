<?php
/**
 *  Classe de Inicialização das rotas do sistema
 *  @author Walderlan Sena - <eu@walderlan.xyz> - 2018
 *  @license https://github.com/WalderlanSena/stocksystem/blob/master/LICENSE
 *  @version v1.0.0  
 * 
 */ 
namespace Core;

use Core\Container;

abstract class Bootstrap
{

    private $router;

    public function __construct()
    {
        // Inicializando rotas da aplicação
        $this->initRoutes();
        // Passando a rota capturanda via URL
        $this->run($this->getUrl());
    }//end construct
    
    /**
     *  @param Recebe requisição feita via url, ou seja, a rota que o usúario deseja acessar
     */ 
    protected function run($request)
    {   
        // Percorrendo a base das rotas da aplicação
        foreach ($this->router as $route) {
            // Se a requisição para a rota for igual a rota base 
            if ($request == $route[0]) {
                $routeFound = true;
                $controller = $route[1];
                $action     = $route[2];
                break;
            } else {
                $routeFound = false;
            }//end if
        }//end foreach

        // Caso alguma rota tenha sido encontrada, a mesma é chamanda
        if ($routeFound) {
            $Controller = Container::newController($controller);
            $Controller->$action();
        } else {
            Container::pageNotFound();
        }//end if
    }//end run

    /**
     *  Método abstrato que define as rotas da aplicação
     */ 
    abstract protected function initRoutes();

    /**
     *  Setando as rotas definidas na class Routes para o atritubo routes da class atual
     */ 
    protected function setRoutes(array $listRoutes)
    {
        $this->router = $listRoutes;
    }//end setRoutes

    /**
     *  @return retorna a requisição referente a rota solicitada 
     */ 
    public function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }//end getUrl
}//end clss Bootstrap