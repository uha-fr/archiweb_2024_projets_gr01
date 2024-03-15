<?php
class HomeView
{
    public function public($emp){
        ob_start();
        $ressource='home';
        $methode='public';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();
        //$html="<html><body>Ma liste</body></html>";
        return $html;
    }
}
