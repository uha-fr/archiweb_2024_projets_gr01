<?php

session_start(); 

class UtilisateurController{
    public function show() {
        require MODELS.DS.'UtilisateurModel.php';
        require MODELS.DS.'DatabaseModel.php';
        require CONTROLLERS.DS.'RecettesController.php' ; 
        require MODELS.DS.'RecettesModel.php';
        $db = new DatabaseModel();
        $user = $this->getUserInfo($db);

        // Faire un check si l'utilisateur est connecté, si oui on affiche la vue, sinon on redirige vers la page de login ! 
        require VIEWS.DS.'UtilisateurView.php';
        $v= new UtilisateurView(); 

        $recettesControll = new RecettesController();
        $recettes = $recettesControll->getRecettes($db, $user->getIdRecettes());
        $html = $v->display($user, $recettes);
        echo $html;
        http_response_code(200);
        exit;
    }

    private function getUserInfo($db){
        $db->connect_bdd();
        $sql = "SELECT * FROM utilisateur WHERE email = '".$_SESSION['email']."'";
        $result = $db->getConnection()->query($sql);
        $row = $result->fetch_assoc();
        $user = new User(
            $row['id_utilisateur'],$row['email'],$row['pseudo'],$row['taille'],$row['poids'],$row['type_utilisateur']
        );
        $db->close_bdd();
        return $user;
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

                $_SESSION['complete_message'] = " - Vos données ont bien été modifiées.";
                header('Location: index.php?Main=user');
                exit();
            }
            else{
                $_SESSION['complete_message'] = " - Les données ne correspondent pas aux standards !";
                header('Location: index.php?Main=user');
                exit();
            }
        }
        else{
            $_SESSION['complete_message'] = " - Les valeurs sont nulles ! ";
            header('Location: index.php?Main=user');
            exit();
        }
    }
}