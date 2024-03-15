<?php

session_start();

require_once "header.php"; 

define('SUCCESS', 'success');
define('ALREADY_EXISTS', 'already');
define('PASSWORD_MISMATCH', 'miss');

function passwordsMatch($password1, $password2) {
    return $password1 === $password2;
}

// Traitement de l'inscription
if(isset($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['password2']) && 
    !empty($_POST['pseudo']) && !empty($_POST['email']) && 
    !empty($_POST['password']) && !empty($_POST['password2'])) {
 
    $pseudo = sanitizeInput($_POST['pseudo']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $password2 = sanitizeInput($_POST['password2']);

    if(!passwordsMatch($password, $password2)) {
        header('Location: ../../index.php?Main=register&regcode='.PASSWORD_MISMATCH);
        exit();
    }

    $pseudo = ucwords(strtolower($pseudo));
    $email = strtolower($email);

    $bdd = connectDB();

    $stmt = $bdd->prepare('SELECT email FROM utilisateur WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();        
    $row = $stmt->rowCount();
    
    if($row == 0) { 
        // Hashage du mot de passe avec Bcrypt !
        $cost = ['cost' => 12];
        $passwordHash = password_hash($password, PASSWORD_BCRYPT, $cost);
        // On set le poids et la taille à 0 de base, maisle changement peut se faire côté BDD avec default 0. ^^
        $insert = $bdd->prepare('INSERT INTO utilisateur(pseudo, email, mot_de_passe, poids, taille) VALUES(:pseudo, :email, :mot_de_passe, 0, 0)');
        $insert->execute(array(
            'pseudo' => $pseudo,
            'email' => $email,
            'mot_de_passe' => $passwordHash
        ));
        header('Location: ../../index.php?Main=register&regcode='.SUCCESS);
        exit();
    } else {
        header('Location: ../../index.php?Main=register&regcode='.ALREADY_EXISTS);
        exit();
    }
}
