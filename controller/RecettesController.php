<?php

require_once '../model/RecettesModel.php';
require_once 'DatabaseController.php';

function getAllRecette()
{
  connect_bdd();
  $sql = "SELECT * FROM recette";
  $result = getConnection()->query($sql);
  $i = 0;
  while ($row = $result->fetch_assoc()) {
        $recette = new Recette(
          $row['id_recette'],$row['nom'],$row['description'], $row['instruction'], 
          $row['difficulte'],$row['categorie'],$row['temps_preparation'],
          $row['temps_cuisson'],$row['calorie'],$row['url_image'],$row['visibility'],
          $row['id_createur']);
        $recettes[$i] = $recette;
        $i++;
  }
  close_bdd();

  //recupere les données de la bdd, pour toute les lignes --> créer des recette avec ses données
  //retourne le tableau de tout les recettes

  /*$t = new Recette("1","tarte a la tomate","Fruit","52","wwwJafji");
  $e = new Recette("2","tarte a la pomme","Fruit","54","url");

  $recettes = [$t,$e];*/
  return $recettes;
}

$recettes = getAllRecette();


?>
