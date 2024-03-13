<?php


    require_once "controllers/process/header.php"; 

    function displayErrorMessage_1($errorCode) {
        switch($errorCode){
            case 'success':
                echo "<h1> Les modifications ont bien été prise en compte. </h1>";
                break; 
            case 'null':
                echo "<h1><storng> Erreur : </strong> valeurs nulles </h1>";
                break; 
            case 'outdata':
                echo "<h1><strong> Erreur : </strong> Les données ne correspondent pas aux standards ! </h1> 
                <br> (Taille doit être comprise entre 130 et 210 cm)
                <br> (Poids doit être au minimum 30 kilos)";
                break; 
            default:
                echo "<h1><strong> Erreur : </strong> inconnue </h1>";
                break;
        }
    }

    require_once VIEWS.DS."UtilisateurView.php";