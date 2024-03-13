<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));
define('CONTROLLERS',ROOT.DS.'controllers');
define('MODELS',ROOT.DS.'models');
define('VIEWS',ROOT.DS.'views');
define('ROUTER',ROOT.DS.'router');

require ROUTER.DS.'Router.php';

$router = new Router(str_replace('/archiweb_2024_projets_gr01','',$_SERVER['REQUEST_URI']));

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

echo $router->resolve();