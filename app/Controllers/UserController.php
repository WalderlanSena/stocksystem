<?php
/**
 *  Controllers User, Gerenciamento das funcionalidade e ações dos usúarios 
 *  @author Walderlan Sena - <eu@walderlan.xyz> - 2018
 *  @license https://github.com/WalderlanSena/stocksystem/blob/master/LICENSE
 *  @version v1.0.0 
 * 
 */ 
namespace App\Controllers;

use Core\Controller;
use Core\Redirector;

class UserController extends Controller
{
    /**
     *  Action que renderiza a view administrativa
     *  @return view administrativa
     */ 
    public function adminAction()
    {
        // Verificação simples se o usúario tem nivel administrativo
        if ($_SESSION['userData']['nivel'] != 1)
            Redirector::redirectToRoute("/");

       return $this->render("user/admin");
    }//end AdminAction

    /**
     *  Action que renderiza a view de usúario comum
     *  @return view de usúario comum
     */ 
    public function painelAction()
    {
        // Verificação se o usúario está logado e se o nivel de acesso é realmente 0
        if (isset($_SESSION['userData']) && $_SESSION['userData']['nivel'] == 0) {
            return $this->render("user/painel");
        } else {
            // Caso contrario é redirecionando para a rota /
            Redirector::redirectToRoute("/");
        }
    }//end painelAction

}//end UserController