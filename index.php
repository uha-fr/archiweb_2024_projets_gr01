<?php

define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));
define('CONTROLLERS',ROOT.DS.'controllers');
define('MODELS',ROOT.DS.'models');
define('VIEWS',ROOT.DS.'views');
define('ROUTER',ROOT.DS.'router');
define('WEBROOT', 'http://'.$_SERVER['SERVER_NAME'].(($_SERVER['SERVER_PORT'] == '80')?'':':'.$_SERVER['SERVER_PORT']).((dirname($_SERVER['SCRIPT_NAME']) == DS)?'':dirname($_SERVER['SCRIPT_NAME'])) );

require ROUTER.DS.'Router.php';

$r = New Router();
$r->manageRequest();