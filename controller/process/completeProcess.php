<?php
    session_start(); 

    require_once "./header.php"; 

    // Constantes pour les codes d'erreur
    define('SUCCESS', 'success');
    define('NULLY', 'null');
    define('OUTDATA', 'outdata');

    if(isset($_POST['taille'], $_POST['poids']) && !empty($_POST['taille']) && !empty($_POST['poids'])){
        $poids = sanitizeInput($_POST['poids']); 
        $taille = sanitizeInput($_POST['taille']); 

        if(($taille >= 130 && $taille <= 220) && $poids >= 30){

            $bdd = connectDB();

            $update = $bdd->prepare('UPDATE utilisateur SET poids = :poids, taille = :taille WHERE email = :email');
            $update->execute(array(
                'poids' => $poids,
                'taille' => $taille,
                'email' => $_SESSION['email']
            ));
            $_SESSION['taille'] = $taille ; 
            $_SESSION['poids'] = $poids ; 
            header('Location: ../../view/UtilisateurView.php?comcode='.SUCCESS);
            exit();
        }
        else{
            header('Location: ../../view/UtilisateurView.php?comcode='.OUTDATA);
            exit();
        }
    }
    else{
        header('Location: ../../view/UtilisateurView.php?comcode='.NULLY);
        exit();
    }