<?php

session_start(); 

class RegisterController {
    public function show() {
        require VIEWS.DS.'RegisterView.php';
        $v= new RegisterView();
        $html=$v->display();
        echo $html;
        http_response_code(200);
        exit;
    }    

    private function sanitizeInput($input) {
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }

    public function registerProcess(){
        if(isset($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['password2']) && 
            !empty($_POST['pseudo']) && !empty($_POST['email']) && 
            !empty($_POST['password']) && !empty($_POST['password2'])) {
         
            $pseudo = $this->sanitizeInput($_POST['pseudo']);
            $email = $this->sanitizeInput($_POST['email']);
            $password = $this->sanitizeInput($_POST['password']);
            $password2 = $this->sanitizeInput($_POST['password2']);
        
            if($password !== $password2) {
                $_SESSION['register_message'] = "Les mots de passe ne sont pas identiques.";
                header('Location: index.php?Main=register');
                exit();
            }
        
            $pseudo = ucwords(strtolower($pseudo));
            $email = strtolower($email);
        
            require MODELS.DS.'DatabaseModel.php';
            $db = new DatabaseModel();
            $db->connect_bdd();
        
            $stmt = $db->prepare('SELECT email FROM utilisateur WHERE email = ?');
            $stmt->bind_param('s', $email);
            $stmt->execute();    
            
            $result = $stmt->get_result();
            $row = $result->num_rows;
            
            if($row == 0) { 
                $cost = ['cost' => 12];
                $passwordHash = password_hash($password, PASSWORD_BCRYPT, $cost);
                
                $insert = $db->prepare('INSERT INTO utilisateur(pseudo, email, mot_de_passe, poids, taille) VALUES(?, ?, ?, 0, 0)');
                $insert->bind_param('sss', $pseudo, $email, $passwordHash);
                $insert->execute();

                $insert->close();

                $db->close_bdd();

                $_SESSION['login_message'] = "Inscription réussie !";
                header('Location: index.php?Main=login');
                exit();
            } else {
                $_SESSION['register_message'] = "L'adresse mail est déjà utilisée.";
                header('Location: index.php?Main=register');
                exit();
            }
        }
    }   
}