<?php
/**
 *  Componente de redirecionamento para rotas especificas
 *  @author Walderlan Sena - <eu@walderlan.xyz> - 2018
 *  @license https://github.com/WalderlanSena/stocksystem/blob/master/LICENSE
 *  @version v1.0.0 
 * 
 */ 
namespace Core;

abstract class Redirector
{
    /**
     *  @param Rota cujo será redirecionada 
     */ 
    public static function redirectToRoute($route)
    {
        return header("Location: $route");
    }//end redirectToRoute
    
}//end redirector
