<?php

class LoginView {
    public function display() {
        ob_start();
        $ressource = 'login';
        $methode = 'form';
        require VIEWS.DS.'template.php'; // Préparer une autre template pour login/register !
        $html = ob_get_clean();

        return $html;
    }
}