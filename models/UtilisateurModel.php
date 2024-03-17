<?php
class User {

    private $id;
    private $email;
    private $pseudo;
    private $poids;
    private $taille;
    private $type;

    private $idRecettes = []; // Initialize as empty array

    private function fetchIdRecettes($id){
        //require MODELS.DS.'DatabaseModel.php';
        $db = new DatabaseModel();
        $db->connect_bdd();
        $sql = "SELECT id_recette FROM recette WHERE id_createur = ".$id;
        $result = $db->getConnection()->query($sql);
        while ($row = $result->fetch_assoc()) {
            $idRecette = $row['id_recette'];
            $idRecettes[] = $idRecette;
        }
        $db->close_bdd();
        if(isset($idRecettes)){
            return $idRecettes;
        }
        return []; // Return empty array instead of 0
    }
    public function __construct($_id = NULL,$_email = NULL ,$_pseudo = NULL ,$_taille = NULL ,$_poids = NULL,$_type = NULL){
        $this->id = $_id;
        $this->email = $_email;
        $this->pseudo = $_pseudo;
        $this->taille = $_taille;
        $this->poids = $_poids;
        $this->type = $_type;
        $idRecettesTmp = $this->fetchIdRecettes($_id) ; 
        if($idRecettesTmp != 0){
            $this->idRecettes = $idRecettesTmp ; 
        }
        else{
            $this->idRecettes = [] ;
        }
        
    }

    public function getIdRecettes(){
        return $this->idRecettes;
    } 

    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getPoids(){
        return $this->poids;
    }

    public function getTaille(){
        return $this->taille;
    }

    public function getType(){
        return $this->type;
    }
}
