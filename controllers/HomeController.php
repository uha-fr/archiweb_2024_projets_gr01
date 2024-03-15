<?php


class HomeController
{
    public function show() {
        require VIEWS.DS.'HomeView.php';
        $v= new HomeView();
        $html=$v->public("");
        echo $html;
        http_response_code(200);
        exit;
    }
}
