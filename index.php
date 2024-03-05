<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));
define('CONTROLLERS',ROOT.DS.'controllers');
define('MODELS',ROOT.DS.'models');
define('VIEWS',ROOT.DS.'views');
define('ROUTER',ROOT.DS.'router');
define('WEBROOT', 'http://'.$_SERVER['SERVER_NAME'].(($_SERVER['SERVER_PORT'] == '80')?'':':'.$_SERVER['SERVER_PORT']).((dirname($_SERVER['SCRIPT_NAME']) == DS)?'':dirname($_SERVER['SCRIPT_NAME'])) );
echo WEBROOT;
require ROUTER.DS.'Router.php';

$router = new Router(str_replace("archiweb_2024_projets_gr01/","",$_SERVER['REQUEST_URI']));

$router->get('/', function(){
    return 'Home';
});

$router->get('/recettes', function(){
    return 'Recettes';
});

$router->get('/recettes/:id', function($id){
    return 'Recettes/' . $id;
});

$router->post('/recettes/:id', function($id){
    return 'Recettes/' . $id;
});

$router->get('/ingredients', function(){
    return 'Ingredients';
});

$router->get('/ingredients/:id', function($id){
    return 'Ingredients/' . $id;
});

$router->post('/ingredients/:id', function($id){
    return 'Ingredients/' . $id;
});

$router->get('/login', function(){
    return 'Login';
});

$router->get('/register', function(){
    return 'Register';
});

$router->get('/user', function(){
    return 'Utilisateur';
});

$router->get('/admin', function(){
    return 'Admin';
});

echo $router->resolve();