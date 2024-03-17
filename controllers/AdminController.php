<?php


class AdminController
{
    

    public function show() {
        require VIEWS.DS.'AdminView.php';
        $v= new AdminView();
        $html=$v->pageAdmin();
        echo $html;
        http_response_code(200);
        exit;
    }

    function ajouter() {
        require CONTROLLERS.DS.'IngredientsController.php';
        require MODELS.DS.'IngredientsModel.php';
        require MODELS.DS.'DatabaseModel.php';
        $db = new DatabaseModel();
        require VIEWS.DS.'AdminView.php';
        $v= new AdminView();
 
        $html=$v->publicAjout();
        echo $html;
        http_response_code(200);
        
        /*
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST['nom'];
            $categorie = $_POST['categorie'];
            $calories = $_POST['calories'];
            $url_image = $_POST['url_image'];
            
            $db->connect_bdd();
            $sql = "INSERT INTO ingredient (nom, categorie, calories, url_image) VALUES ('$nom', '$categorie', $calories, '$url_image')";
            
            if ($db->getConnection()->query($sql) === TRUE) {
                echo "Ingrédient ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'ingrédient: " . $db->getConnection()->error;
            }
            
            $db->close_bdd();
        }*/
        
        exit;
    }
}
