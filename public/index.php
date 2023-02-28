<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);


$router->add('users', ['controller' => 'UserControler', 'action' => 'index']);
$router->add('users/', ['controller' => 'UserControler', 'action' => 'index']);

$router->add('facture', ['controller' => 'FactureControler', 'action' => 'index']);
$router->add('facture/', ['controller' => 'FactureControler', 'action' => 'index']);



$router->add('produit', ['controller' => 'ProduitControler', 'action' => 'getProduitById']);

$router->add('facture/creerFacture', ['controller' => 'FactureControler', 'action' => 'creerFacture']);
$router->add('facture/archiverFacture', ['controller' => 'FactureControler', 'action' => 'archiverFacture']);

$router->add('users/newUser', ['controller' => 'UserControler', 'action' => 'createUser']);
$router->add('{controller}/{action}');

    
$router->dispatch($_SERVER['QUERY_STRING']);
