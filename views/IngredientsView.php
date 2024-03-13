<?php

class IngredientsView
{
    public function publicList($ingredients){
        ob_start();
        $ressource='ingredients';
        $methode='list';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();
        //$html="<html><body>Ma liste</body></html>";
        return $html;
    }

    public function publicIngredient($ingredient){
        ob_start();
        $ressource='ingredients';
        $methode='listone';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();
        //$html="<html><body>Ma liste</body></html>";
        return $html;
    }
}