<?php


class AdminController
{
    public function show() {
        require VIEWS.DS.'AdminView.php';
        $v= new AdminView();
        $html=$v->pageAdmin();
        echo $html;
        http_response_code(200);
        exit;
    }
}
