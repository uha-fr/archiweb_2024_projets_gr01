<?php
//include("./HTMLHead.php");

class AdminView
{
    public function pageAdmin(){
        ob_start();
        $ressource='admin';
        $methode='pageAdmin';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();
        //$html="<html><body>Ma liste</body></html>";
        return $html;
    }


public function publicAjout(){
    ob_start();
    $ressource='admin';
    $methode='addIngredientForm';
    require VIEWS.DS.'template.php';
    $html = ob_get_clean();
    //$html="<html><body>Ma liste</body></html>";
    return $html;
}
}
?>


<?php
//include("./HTMLEnd.php");
?>