<?php

class Ingredient
{
    private $id;
    private $nom;
    private $categorie;
    private $calorie;
    private $url_image;

    public function __construct($_id = 0,$_nom = 0 ,$_categorie = 0,$_calorie = 0,$_url_image = 0){
        $this->id = $_id;
        $this->nom = $_nom;
        $this->categorie = $_categorie;
        $this->calorie = $_calorie;
        $this->url_image = $_url_image;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getCategorie(){
        return $this->categorie;
    }

    public function getCalorie(){
        return $this->calorie;
    }

    public function getUrlImg(){
        return $this->url_image;
    }

}
    

?>
