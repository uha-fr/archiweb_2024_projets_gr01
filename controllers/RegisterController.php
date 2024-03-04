<?php

function displayErrorMessage($errorCode) {
        switch($errorCode){
            case 'success':
                echo "<h1>Successful registration</h1>";?>
                <a href="home.php"><button> Accéder à l'accueil </button></a>
                <?php
                exit(); 
            case 'already':
                echo "<h1><strong> Erreur : </strong> Cette adresse email est déjà liée à un compte. </h1>";
                break; 
            case 'miss':
                echo "<h1><strong> Erreur : </strong> Les mots de passe ne sont pas identiques </h1>";
                break;
            default:
                echo "<h1><strong> Erreur : </strong> inconnue </h1>";
                break;
        }
    }
    if(isset($_GET['regcode'])){
        $err = htmlspecialchars($_GET['regcode']);
        displayErrorMessage($err);
    }