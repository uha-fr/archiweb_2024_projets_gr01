<?php
header('Location: ./view/home.php');


// Vérifiez l'URL demandée
$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

// Dirigez l'URL vers le bon contrôleur et action
switch ($url) {
    case '/archiweb_2024_projets_gr01/view/home':
        require_once 'controller/HomeController.php';
        HomeController::show();
        break;
    case '/archiweb_2024_projets_gr01/view/ingredients':
        require_once 'controller/IngredientsController.php';
        IngredientsController::show();
        break;
    case '/archiweb_2024_projets_gr01/view/recettes':
        require_once 'controller/RecettesController.php';
        RecettesController::show();
        break;
    case '/archiweb_2024_projets_gr01/view/admin':
        require_once 'controller/AdminController.php';
        AdminController::show();
        break;
    default:
        
        echo "Page not found";
        break;
}
?>
