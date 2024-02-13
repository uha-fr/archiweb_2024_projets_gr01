<?php


    require_once "../controller/process/header.php"; 
    function displayErrorMessage($errorCode) {
        switch($errorCode){
            case 'failure':
                echo "<h1><strong> Erreur : </strong> Aucune correspondance pour les informations fournies. </h1>";
                break;
            case 'disconnect': 
                echo "<h1><strong> Vous vous êtes déconnectes </h1>";
                break; 
            default:
                echo "<h1><strong> Erreur : </strong> inconnue </h1>";
                break;
        }
    }
    if(isset($_GET['logcode'])){
        $errorMessage = htmlspecialchars($_GET['logcode']);
        displayErrorMessage($errorMessage);
    }