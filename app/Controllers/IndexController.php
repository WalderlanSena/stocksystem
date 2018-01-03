<?php
/**
 *  Controllers Index 
 *  @author Walderlan Sena - <eu@walderlan.xyz> - 2018
 *  @license https://github.com/WalderlanSena/stocksystem/blob/master/LICENSE
 *  @version v1.0.0 
 * 
 */ 
namespace App\Controllers;

use Core\Controller;

class IndexController extends Controller
{   
    /**
     *  Action que renderiza a view index
     *  @return render da view index
     */
    public function indexAction()
    {
        return $this->render("index/index");
    }//end indexAction

}//end IndexController