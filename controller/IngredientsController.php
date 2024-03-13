<?php

require_once '../model/IngredientsModel.php';
require_once 'DatabaseController.php';

function createIngredient($nom = NULL, $categorie = NULL, $calories = NULL, $url_image = NULL)
{
  //add dans la base de donnée
  global $ingredients;
  $ingredients = getAllIngredient();
}

function getAllIngredient()
{

  connect_bdd();
  $sql = "SELECT * FROM ingredient";
  $result = getConnection()->query($sql);
  $i = 0;
  while ($row = $result->fetch_assoc()) {
        $ingredient = new Ingredient($row['id_ingredient'],$row['nom'],$row['categorie'], $row['calories'], $row['url_image']);
        $ingredients[$i] = $ingredient;
        $i++;
  }
  close_bdd();

  //recupere les données de la bdd, pour toute les lignes --> créer des ingredients avec ses données
  //retourne le tableau de tout les ingredients

  /*$t = new Ingredient("1","Tomate","Fruit","52","wwwJafji");
  $e = new Ingredient("2","Pomme","Fruit","54","url");

  $ingredients = [$t,$e];*/
  return $ingredients;
}

$ingredients = getAllIngredient();
//$ingredients = new Ingredient("1","Tomate","Fruit","52","wwwJafji");





