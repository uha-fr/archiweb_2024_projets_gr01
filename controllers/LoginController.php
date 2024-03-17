<?php

session_start(); 

class LoginController {
    public function show() {
        require VIEWS.DS.'LoginView.php';
        $v= new LoginView();
        $html=$v->display();
        echo $html;
        http_response_code(200);
        exit;
    }

    public function emailsent(){
        require VIEWS.DS.'LoginView.php';
        $v= new LoginView();
        $html=$v->emailsent();
        echo $html;
        http_response_code(200);
        exit;
    }
    public function logout() {
        // Destroy the session.
        $_SESSION = array();
        session_destroy();
        // Destroy the cookie. 
        if(isset($_COOKIE['loggedCookie'])) {
            unset($_COOKIE['loggedCookie']); 
            setcookie('loggedCookie', "", 1); 
        } 
        $_SESSION['login_message'] = "Vous êtes déconnectés."; 
        header('Location: index.php'); 
    }

    public function checklogin() {
        if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            require MODELS.DS.'DatabaseModel.php';
            $db = new DatabaseModel();
    
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Get the MySQLi connection object from the DatabaseModel
            $db->connect_bdd();
    
            // Prepare and execute the SQL query
            $check = $db->prepare('SELECT * FROM utilisateur WHERE email = ?');
            $check->bind_param("s", $email);
            $check->execute();
            $result = $check->get_result();
    
            // Check if the query returned any rows
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                // Verify the password
                if (password_verify($password, $data['mot_de_passe'])) {
                    // Set user session and cookie
                    $_SESSION['email'] = $email;
    
                    $db->close_bdd();
    
                    header('Location: index.php?Main=user');
                    exit();
                } else {
                    // Incorrect password, set error message and redirect to login page
                    $_SESSION['login_message'] = "Mot de passe incorrect";
                    header('Location: index.php?Main=login');
                    exit();
                }
            }
        }
        // If login fails, redirect to login page
        $_SESSION['login_message'] = "Aucun utilisateur trouvé pour l'email fourni";
        header('Location: index.php?Main=login');
        exit();
    }

    public function forgotten(){
        if(isset($_POST['email']) && !empty($_POST['email'])) {
            require MODELS.DS.'DatabaseModel.php';
            $db = new DatabaseModel();
            $db->connect_bdd();

            $email = htmlspecialchars($_POST['email']) ; 

            $check = $db->prepare('SELECT date_request FROM utilisateur WHERE email = ?');
            $check->bind_param("s", $email);
            $check->execute();
            $result = $check->get_result();

            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();

                $token = bin2hex(random_bytes(16));

                date_default_timezone_set('Europe/Paris');
                $date = date("Y-m-d H:i:s"); 

                if(empty($data['date_request']) || (strtotime($date) - strtotime($data['date_request'])) > (5*60)){
                    $insert = $db->prepare('UPDATE utilisateur SET token = ?, date_request = ? WHERE email = ?');
                    $insert->bind_param("sss", $token, $date, $email);
                    $insert->execute();

                    $fakelink = 'index.php?Main=login&Action=reset&token='.$token;
                    $link = 'localhost/archiweb_2024_projets_gr01/index.php?Main=login&Action=reset&token='.$token;
                    
                    // logique de génération de l'email. 

                    $to = $email;
                    $sender = "archiweb_2024_projets_gr01@localhost";
                    $subject = "Réinitialisation de votre mot de passe sur le site de MANGER";

                    // peaufiner le message ! 
                    $message= "Cher utilisateur,

                    Vous avez récemment demandé la réinitialisation de votre mot de passe sur notre site web de MANGER. Pour procéder à cette réinitialisation, veuillez suivre les étapes ci-dessous :
                    
                    Cliquez sur le lien ci-dessous pour accéder à la page de réinitialisation de mot de passe :
                    '".$link."'
                    
                    Sur la page de réinitialisation, suivez les instructions pour choisir un nouveau mot de passe sécurisé.
                    
                    Une fois que vous avez choisi votre nouveau mot de passe, assurez-vous de le mémoriser ou de le stocker en toute sécurité.
                    
                    Si vous n'avez pas demandé cette réinitialisation ou si vous avez des questions, veuillez contacter notre équipe de support à l'adresse suivante : '".$sender."'.
                    
                    Merci de votre compréhension et de votre coopération.
                    
                    Cordialement,
                    L'équipe du projet MANGER";

                    $headers = "Content-type: text/html; charset=utf-8\r\n";
                    $headers = "From: ".$sender."\r\n";
                    //mail($to, $subject, $message, $headers);

                    $_SESSION['reset_message'] = "Un lien vous a été envoyé à votre adresse mail. Vous pouvez fermer cette page.
                    <a href='".$fakelink."'> Voici le lien (shuuut !!!) </a>";

                    $db->close_bdd();
                    header('Location: index.php?Main=login&Action=emailsent');
                    exit() ; 
                    
                }
                else{
                    $date_diff = 5*60 - (strtotime($date) - strtotime($data['date_request'])) ; 
                    $date_diff2 = (strtotime($date) + $date_diff) ; 
                    $date_diff3 = date("H:i:s", $date_diff2) ; 
                    $_SESSION['reset_message'] = "Trop de demandes, revenez à : ". $date_diff3." soit dans ".date("i",$date_diff)." minutes et ".date("s",$date_diff)." secondes.";
                    header('Location: index.php?Main=login&Action=emailsent');
                    exit();
                }
            } 
            else {
                $_SESSION['login_message'] = "Aucun utilisateur trouvé pour l'email fourni";
                header('Location: index.php?Main=login');
                exit();
            }
        }
    }

    public function reset($_token){
        if(!empty($_token)) {

            require MODELS.DS.'DatabaseModel.php';
            $db = new DatabaseModel();
            $db->connect_bdd();

            $token = htmlspecialchars($_token); 

            $check = $db->prepare('SELECT * FROM utilisateur WHERE token = ?');
            $check->bind_param("s", $token);
            $check->execute();
            $result = $check->get_result();
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();

                date_default_timezone_set('Europe/Paris');
                $date = date("Y-m-d H:i:s") ; 

                if ( (strtotime($date) - strtotime($data['date_request'])) <= 15*60){ // 60sec x 15 min. 
                    if(hash_equals($data['token'], $token)){
                        $db->close_bdd();
                        require VIEWS.DS.'LoginView.php';
                        $v= new LoginView();
                        $html=$v->reset($data['email']);
                        echo $html;
                        http_response_code(200);
                        exit;
                    }
                }
                else{
                    $_SESSION['reset_message'] = "Lien expiré";
                    header('Location: index.php?Main=login&Action=emailsent');
                    exit();
                }
                
            } else {
                $_SESSION['reset_message'] = "Aucun utilisateur trouvé pour le token fourni : ".$token;
                header('Location: index.php?Main=login&Action=emailsent');
                exit();
            }
        }
    }     

    public function passwordChanges(){
        if(isset($_POST['password'], $_POST['c_password'], $_POST['email']) && !empty($_POST['password']) && !empty($_POST['c_password']) && !empty($_POST['email'])) {
            $password = htmlspecialchars($_POST['password']);
            $c_password = htmlspecialchars($_POST['c_password']);
            $email = htmlspecialchars($_POST['email']);

            if($password === $c_password){
                require MODELS.DS.'DatabaseModel.php';
                $db = new DatabaseModel();
                $db->connect_bdd();

                $password = password_hash($password, PASSWORD_DEFAULT);

                $insert = $db->prepare('UPDATE utilisateur SET mot_de_passe = ?, token = NULL, date_request = NULL WHERE email = ?');
                $insert->bind_param("ss", $password, $email);
                $insert->execute();

                $db->close_bdd();

                $_SESSION['home_message'] = "Mot de passe modifié avec succès";

                // On redirige vers la page d'accueil. 
                require VIEWS.DS.'HomeView.php';
                $v= new HomeView();
                $html=$v->public("");
                echo $html;
                http_response_code(200);
                exit;
            }
            else{
                $_SESSION['pwd_message'] = "<h3>Les mots de passe ne correspondent pas. </h3>";
                require VIEWS.DS.'LoginView.php';
                $v= new LoginView();
                $html=$v->reset($email);
                echo $html;
                http_response_code(200);
                exit;
            }
        }
        else{
            if(empty($email)){
                $_SESSION['home_message'] = "Erreur critique, veuillez contacter l'administrateur du site.";
                require VIEWS.DS.'HomeView.php';
                $v= new HomeView();
                $html=$v->public("");
                echo $html;
                http_response_code(200);
                exit;
            }   
            else{
            $_SESSION['pwd_message'] = "Veuillez remplir tous les champs";
            require VIEWS.DS.'LoginView.php';
            $v= new LoginView();
            $html=$v->reset($data['email']);
            echo $html;
            http_response_code(200);
            exit;
            } 
        }
    }
}