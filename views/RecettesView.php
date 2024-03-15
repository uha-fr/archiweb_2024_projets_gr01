<?php

class RecettesView
{
    public function publicList($recettes){
        ob_start();
        $ressource='recettes';
        $methode='list';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();
        //$html="<html><body>Ma liste</body></html>";
        return $html;
    }

    public function publicRecette($recette){
        ob_start();
        $ressource='recettes';
        $methode='listone';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();
        //$html="<html><body>Ma liste</body></html>";
        return $html;
    }
}