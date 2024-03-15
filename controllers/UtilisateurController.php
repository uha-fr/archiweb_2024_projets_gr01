<?php

session_start(); 

class UtilisateurController{
    public function show() {
        //require MODELS.DS.'UtilisateurModel.php'; Se pencher si oui ou non on réalise un modèle User. 
        require MODELS.DS.'DatabaseModel.php';
        $db = new DatabaseModel();
        //$user = getUserInfo($db); 

        // Faire un check si l'utilisateur est connecté, si oui on affiche la vue, sinon on redirige vers la page de login ! 
        require VIEWS.DS.'UtilisateurView.php';
        $v= new UtilisateurView(); 
        $html=$v->display();
        echo $html;
        http_response_code(200);
        exit;
    }

    private function sanitizeInput($input) {
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }

    public function completeProfile(){
        if(isset($_POST['taille'], $_POST['poids']) && !empty($_POST['taille']) && !empty($_POST['poids'])){
            $poids = $this->sanitizeInput($_POST['poids']); 
            $taille = $this->sanitizeInput($_POST['taille']); 
    
            if(($taille >= 100 && $taille <= 250) && $poids >= 30 && $poids <= 300){ // On peux revenir plus tard dessus
    
                require MODELS.DS.'DatabaseModel.php';
                $db = new DatabaseModel();
                $db->connect_bdd();
    
                $update = $db->prepare('UPDATE utilisateur SET poids = ?, taille = ? WHERE email = ?');
                $update->bind_param('iis', $poids, $taille, $_SESSION['email']);
                $update->execute();

                $_SESSION['taille'] = $taille ; 
                $_SESSION['poids'] = $poids ; 

                $db->close_bdd();

                $_SESSION['complete_message'] = "Vos données ont bien été modifiées.";
                header('Location: index.php?Main=user');
                exit();
            }
            else{
                $_SESSION['complete_message'] = "Les données ne correspondent pas aux standards !";
                header('Location: index.php?Main=user');
                exit();
            }
        }
        else{
            $_SESSION['complete_message'] = "Valeurs nulles";
            header('Location: index.php?Main=user');
            exit();
        }
    }
}