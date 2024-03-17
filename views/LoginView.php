<?php

class LoginView {
    public function display() {
        ob_start();
        $ressource = 'login';
        $methode = 'form';
        require VIEWS.DS.'template.php'; 
        $html = ob_get_clean();

        return $html;
    }

    public function emailsent() {
        ob_start();
        $ressource = 'login';
        $methode = 'emailsent';
        require VIEWS.DS.'template.php'; 
        $html = ob_get_clean();

        return $html;
    }

    public function reset($email){
        ob_start();
        $ressource = 'login';
        $methode = 'reset';
        require VIEWS.DS.'template.php'; 
        $html = ob_get_clean();

        return $html;
    }
}