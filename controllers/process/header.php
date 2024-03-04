<?php

// Header.php contient les fonctions réutilisés pour les processus de connexion, inscription et modification d'informations dans la base de données. 
function connectDB() {
    try {
        return new PDO('mysql:host=localhost;dbname=manger;charset=utf8', 'root', '');
    } catch(PDOException $e) {
        die('Erreur : '.$e->getMessage());
    }
}

// Fonction pour nettoyer les données d'entrée
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

function setSession($data){
    $_SESSION['email'] = $data['email']; 
    $_SESSION['pseudo'] = $data['pseudo']; 
    $_SESSION['poids'] = $data['poids']; 
    $_SESSION['taille'] = $data['taille']; 
    $_SESSION['type'] = $data['type_utilisateur']; 
    // On peux rajouter d'autres données ! 
}

function disconnect(){
        session_destroy();
        if(isset($_COOKIE['loggedCookie'])) {
            unset($_COOKIE['loggedCookie']); 
            setcookie('loggedCookie', "", 1); 
        }

    }

    if(isset($_POST['logout'])) {
        disconnect();
        header('Location: ../view/LoginView.php?logcode=disconnect');
        exit() ; 
    }

