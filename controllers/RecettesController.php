<?php
class RecettesController {
  public function show() {
    require MODELS.DS.'RecettesModel.php';
    require MODELS.DS.'DatabaseModel.php';
    $db = new DatabaseModel();
    $recettes = getAllRecette($db);
    require VIEWS.DS.'RecettesView.php';
    $v= new RecettesView();
    $html=$v->publicList($recettes);
    echo $html;
    http_response_code(200);
    exit;
  }

  public function showone($id) {
    require MODELS.DS.'RecettesModel.php';
    require MODELS.DS.'DatabaseModel.php';
    $db = new DatabaseModel();
    $recette = getRecette($db,$id);
    require VIEWS.DS.'RecettesView.php';
    $v= new RecettesView();
    $html=$v->publicRecette($recette);
    echo $html;
    http_response_code(200);
    exit;
  }
}

function getAllRecette($db, $trie = null)
{
  $db->connect_bdd();
  $sql = "SELECT * FROM recette";
  $result = $db->getConnection()->query($sql);
  while ($row = $result->fetch_assoc()) {
        $recette = new Recette(
          $row['id_recette'],$row['nom'],$row['description'], $row['instruction'], 
          $row['difficulte'],$row['categorie'],$row['temps_preparation'],
          $row['temps_cuisson'],$row['calorie'],WEBROOT.$row['url_image'],$row['visibility'],
          $row['id_createur']);
        $recettes[] = $recette;
  }
  $db->close_bdd();


  if($trie != null)
  {
    require_once("TrieGenerique.php");
    
    switch($trie)
    {
      case "NAME_A2Z":
        $recettes = trierA2Z($recettes);
        break;
      
      case "CATEGORIE_A2Z":
        $recettes = trierCategorie($recettes);
        break;

      case "CALORIE_A2Z":
        $recettes = trierCalorie($recettes);
        break;
      
      default:
        break;
    }
  }


  return $recettes;
}

function getRecette($db,$id)
{
  $db->connect_bdd();
  
  $sql = "SELECT * FROM recette WHERE id_recette = $id";
  $result = $db->getConnection()->query($sql);
    if ($result->num_rows == 0) {
      return null;
    } else {
      $row = $result->fetch_assoc();
      $recette = new Recette(
        $row['id_recette'],$row['nom'],$row['description'], $row['instruction'], 
        $row['difficulte'],$row['categorie'],$row['temps_preparation'],
        $row['temps_cuisson'],$row['calorie'],WEBROOT.$row['url_image'],$row['visibility'],
        $row['id_createur']);
    }
  $db->close_bdd();
  return $recette;
}

?>