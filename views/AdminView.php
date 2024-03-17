<?php
class AdminView
{
    public function pageAdmin(){
        ob_start();
        $ressource='admin';
        $methode='pageAdmin';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();
        return $html;
    }
}

