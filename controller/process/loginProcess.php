<?php
    session_start(); 

    require_once "./header.php"; 

    // Fonction de validation du formulaire de connexion
    function validateLoginForm($bdd) {
        if (isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $check = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ?');
            $check->execute(array($_POST['email']));
            $data = $check->fetch();
            $row = $check->rowCount();
            if($row > 0 && password_verify($_POST['password'], $data['mot_de_passe'])){
                // Création du contenu du cookie. 
                    /*$loggedUser = [
                        'email' => $data['email'],
                        'pseudo' => $data['pseudo']
                    ];*/
                

                setSession($data); 
                
                // Création du cookie
                    //$jsonArray = json_encode($loggedUser);
                    // setCookie("loggedCookie", $jsonArray, (time() + 5*60)); 
                header('Location: ../../view/UtilisateurView.php');
                exit(); 
            } else {
                header('Location: ../../view/LoginView.php?logcode=failure');
                exit(); 
            }   
        }
        return false;
    }

    // Connexion à la base de données
    $bdd = connectDB();

    // Validation du formulaire
    $errorMessage = validateLoginForm($bdd);
