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
use Core\Container;
use Core\Redirector;

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

    /**
     *  Action que realiza a autenticação dos usúarios no sistema
     *  @return Json com a flag referente ao usúario encontrado
     */ 
    public function loginAction()
    {
        // Verificando a solicitação de requisição post na action
        if (isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['logar'])) {
            // Capturando os valores solicitados
            $login = filter_input(INPUT_POST, "login",  FILTER_SANITIZE_ENCODED);
            $senha = filter_input(INPUT_POST, "senha",  FILTER_SANITIZE_ENCODED);
            $dados = $_POST['logar'];
            // Iterando sobre a estrutura de dados vinda do localStorage
            for ($i = 0; $i < count($dados); $i++):
                if ($login == $dados[$i]['login'] && password_verify($senha, $dados[$i]['senha'])) {
                    // Se o usúario for administrador ou usúario comum o mesmo é redirecionando para a view especifica
                    if ($dados[$i]['nivel'] == 1) {
                        $data = array("msg" => "admin");
                        break;
                    } else if ($dados[$i]['nivel'] == 0) {
                        $data = array("msg" => "user");
                        // Iniciando a session
                        session_start();
                        $_SESSION['userData'] = [
                            "login" => $dados[$i]['login'],
                            "nivel" => $dados[$i]['nivel']
                        ]; 
                        break;
                    } else {
                        $data = array("msg" => "Login ou senha ínvalidos !");
                    }
                } else {
                    $data = array("msg" => "Login ou senha ínvalidos !");
                }
            endfor;
            // Return Json com a informação
            echo json_encode($data);
        } else {
            // Caso não exista a requisição basica. Redireciona o usúario para 404
            Container::pageNotFound();
        }//end if
    }//end actionLogin


    public function logoutAction()
    {
        unset($_SESSION['userData']);
        session_destroy();
        Redirector::redirectToRoute("/");
    }
}//end IndexController