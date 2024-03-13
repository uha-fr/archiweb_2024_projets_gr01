<?php
class IngredientsController {
  public function show() {
    require MODELS.DS.'IngredientsModel.php';
    require MODELS.DS.'DatabaseModel.php';
    $db = new DatabaseController();
    $ingredients = getAllIngredient($db);
    require VIEWS.DS.'IngredientsView.php';
    $v= new IngredientsView();
    $html=$v->publicList($ingredients);
    echo $html;
    http_response_code(200);
    exit;
  }

  public function showone($id) {
    require MODELS.DS.'IngredientsModel.php';
    require MODELS.DS.'DatabaseModel.php';
    $db = new DatabaseController();
    $ingredient = getIngredient($db,$id);
    require VIEWS.DS.'IngredientsView.php';
    $v= new IngredientsView();
    $html=$v->publicIngredient($ingredient);
    echo $html;
    http_response_code(200);
    exit;
  }

}

function getAllIngredient($db)
{
  $db->connect_bdd();
  $sql = "SELECT * FROM ingredient";
  $result = $db->getConnection()->query($sql);
  $i = 0;
  while ($row = $result->fetch_assoc()) {
        $ingredient = new Ingredient($row['id_ingredient'],$row['nom'],$row['categorie'], $row['calories'], $row['url_image']);
        $ingredients[$i] = $ingredient;
        $i++;
  }
  $db->close_bdd();
  return $ingredients;
}

function getIngredient($db,$id)
{
  $db->connect_bdd();
  
  $sql = "SELECT * FROM ingredient WHERE id_ingredient = $id";
  $result = $db->getConnection()->query($sql);
    if ($result->num_rows == 0) {
      return null;
    } else {
      $row = $result->fetch_assoc();
      $ingredient = new Ingredient($row['id_ingredient'],$row['nom'],$row['categorie'], $row['calories'], $row['url_image']);
    }
  $db->close_bdd();
  return $ingredient;
}





