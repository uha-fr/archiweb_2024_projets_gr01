<?php
class UtilisateurView {
    public function display($user, $recettes) {
        ob_start();
        $ressource = 'utilisateur';
        $methode = 'infos';
        require VIEWS.DS.'template.php';
        $html = ob_get_clean();

        return $html;
    }
}
