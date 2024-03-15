<?php
class UtilisateurView {
    public function display() {
        ob_start();
        $ressource = 'utilisateur';
        $methode = 'infos';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();

        return $html;
    }
}
