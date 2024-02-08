<?php

require_once 'model/IngredientsModel.php';

class IngredientsController {
    public static function show() {
        // Récupérer les données des ingrédients depuis le modèle
        $ingredients = Model::getIngredients();

        // Charger la vue des ingrédients
        include_once 'views/IngredientsView.php';
    }
}
?>
