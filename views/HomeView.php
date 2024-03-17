<?php
class HomeView
{
    public function public($emp){
        ob_start();
        $ressource='home';
        $methode='public';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();
        return $html;
    }
}
