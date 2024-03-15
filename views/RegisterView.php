<?php

class RegisterView {
    public function display() {
        ob_start();
        $ressource = 'register';
        $methode = 'form';
        require VIEWS.DS.'template.php'; 
        $html = ob_get_clean();

        return $html;
    }
}