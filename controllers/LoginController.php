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
    public function logout() {
        // Destroy the session.
        $_SESSION = array();
        session_destroy();
        // Destroy the cookie. 
        if(isset($_COOKIE['loggedCookie'])) {
            unset($_COOKIE['loggedCookie']); 
            setcookie('loggedCookie', "", 1); 
        } 
        $_SESSION['error_message'] = "Vous êtes déconnectés."; 
        header('Location: index.php'); 
    }

    public function setCurrentUserSession($data) {
        $_SESSION['email'] = $data['email']; 
        $_SESSION['pseudo'] = $data['pseudo']; 
        $_SESSION['poids'] = $data['poids']; 
        $_SESSION['taille'] = $data['taille']; 
        $_SESSION['type'] = $data['type_utilisateur']; 
    }

    public function setCurrentUserCookie($data) {
        $loggedUser = [
            'email' => $data['email'],
            'pseudo' => $data['pseudo'],
            'poids' => $data['poids'],
            'taille' => $data['taille'],
            'type' => $data['type_utilisateur']
        ];
        $jsonArray = json_encode($loggedUser);
        setCookie("loggedCookie", $jsonArray, time() + 3600); 
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
                    $this->setCurrentUserSession($data);
                    $this->setCurrentUserCookie($data);
    
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
    
}