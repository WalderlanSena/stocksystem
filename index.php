<?php
/**
 *  Sistema de Controle de Estoque de Veículos
 *  @author Walderlan Sena - <eu@walderlan.xyz> - 2018
 *  @license https://github.com/WalderlanSena/stocksystem/blob/master/LICENSE
 *  @version v1.0.0
 *   
 */ 

require_once "vendor/autoload.php";

// Verificando a existência de uma session
if(!session_id()) session_start();

// Inicializando a aplicação
$app = new \Core\Routes();