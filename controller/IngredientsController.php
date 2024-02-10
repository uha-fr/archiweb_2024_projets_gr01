<?php

require_once '../model/IngredientsModel.php';


function getAllIngredient()
{
  //recupere les données de la bdd, pour toute les lignes --> créer des ingredients avec ses données
  //retourne le tableau de tout les ingredients

  $t = new Ingredient("1","Tomate","Fruit","52","wwwJafji");
  $e = new Ingredient("2","Pomme","Fruit","54","url");

  $ingredients = [$t,$e];
  return $ingredients;
}

$ingredients = getAllIngredient();
//$ingredients = new Ingredient("1","Tomate","Fruit","52","wwwJafji");





