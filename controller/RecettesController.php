<?php

require_once '../model/RecettesModel.php';


function getAllRecette()
{
  //recupere les données de la bdd, pour toute les lignes --> créer des recette avec ses données
  //retourne le tableau de tout les recettes

  $t = new Recette("1","tarte a la tomate","Fruit","52","wwwJafji");
  $e = new Recette("2","tarte a la pomme","Fruit","54","url");

  $recettes = [$t,$e];
  return $recettes;
}

$recettes = getAllRecette();


?>
