<?php

require_once 'model/RecettesModel.php';

class RecettesController {
    public static function show() {
        // Récupérer les données des ingrédients depuis le modèle
        $recettes = Model::getRecettes();

        // Charger la vue des ingrédients
        include_once 'views/RecettesView.php';
    }
}
?>
