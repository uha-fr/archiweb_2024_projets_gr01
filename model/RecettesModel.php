<?php

class Recette
{
    private $id;
    private $nom;
    private $description;
    private $categorie; //entrée, plat dessert
    private $url_image;

    private $tableau_ingredients;
    private $tableau_ustensiles;

    private $temps_preparation;
    private $temps_cuisson;

    private $difficulte;
    private $visibility;
    private $id_createur;

    public function __construct($_id = NULL,$_nom = NULL ,$_description = NULL ,$_categorie = NULL,$_url_image = NULL, $_tableau_ingredients = NULL, $_tableau_ustensiles = NULL,$_temps_preparation = NULL,$_temps_cuisson = NULL,$_difficulte = NULL,$_visibility = NULL,$_id_createur = NULL){
        $this->id = $_id;
        $this->nom = $_nom;
        $this->description = $_description;
        $this->categorie = $_categorie;
        $this->url_image = $_url_image;
        
        $this->tableau_ingredients = $_tableau_ingredients;
        $this->tableau_ustensiles = $_tableau_ustensiles;
        
        $this->temps_preparation = $_temps_preparation;
        $this->temps_cuisson = $_temps_cuisson;

        $this->difficulte = $_difficulte;
        $this->visibility = $_visibility;
        $this->id_createur = $_id_createur;
    }

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getCategorie(){
        return $this->categorie;
    }

    public function getUrlImg(){
        return $this->url_image;
    }

    public function getTabIngredients(){
        return $this->tableau_ingredients;
    }

    public function getTabUstensiles(){
        return $this->tableau_ustensiles;
    }

    public function getTmpPreparation(){
        return $this->temps_preparation;
    }

    public function getTmpCuisson(){
        return $this->temps_cuisson;
    }

    public function getDifficulte(){
        return $this->difficulte;
    }

    public function getVisibility(){
        return $this->visibility;
    }

    public function getIdCreateur(){
        return $this->id_createur;
    }





}









?>