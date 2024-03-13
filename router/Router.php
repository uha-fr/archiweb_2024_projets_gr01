<?php

class Router
{
    function manageRequest(){
        if(isset($_GET["Main"]))
        {
            switch($_GET["Main"])
            {
                case "home":
                    $this->home();
                    break;
                case "ingredients":
                    $this->ingredients();
                    break;
                case "recettes":
                    $this->recettes();
                    break;
                case "admin":
                    $this->admin();
                    break;


                default:
                    $this->home();
                    break;
            }
        }

        else
        {
            $this->home();
        }
        
    }

    private function home()
    {
        require CONTROLLERS.DS.'HomeController.php';
        $controller = new HomeController();
        if(isset($_GET["Action"]))
        {
            switch($_GET["Action"])
            {
                case "show":
                    $controller->show();
                    break;

                
                default:
                    $controller->show();
                    break;
            }
        }

        else
        {
            $controller->show();
        }

    }

    private function ingredients()
    {
        require CONTROLLERS.DS.'IngredientsController.php';
        $controller = new IngredientsController();
        if(isset($_GET["Action"]))
        {
            switch(isset($_GET["Action"]))
            {
                
                case "showone":
                    //trigger_error("Oops!", E_USER_ERROR);
                    if(isset($_GET["id"]))
                    {
                        $id_ = $_GET["id"];
                        $controller->showone($id_);
                    }               
                    break;
                    
                case "show":
                    //trigger_error("Oops!", E_USER_ERROR);
                    $controller->show();
                    break;
                
                default:
                    $controller->show();
                    break;
            }
        }

        else
        {
            $controller->show();
        }
    }

    private function recettes()
    {
        require CONTROLLERS.DS.'RecettesController.php';
        $controller = new RecettesController();
        if(isset($_GET["Action"]))
        {
            switch($_GET["Action"]){
                case "showone":
                    if(isset($_GET["id"]))
                    {
                        $id_ = $_GET["id"];
                        $controller->showone($id_);
                    }      
                    
                case "show":
                    $controller->show();
                    break;
 
                default:
                    $controller->show();
                    break;
            }
        }

        else
        {
            $controller->show();
        }
    }

    private function admin()
    {
        require CONTROLLERS.DS.'AdminController.php';
        $controller = new AdminController();
        if(isset($_GET["Action"]))
        {
            switch($_GET["Action"]){
                case "show":
                    $controller->show();
                    break;
                
                default:
                    $controller->show();
                    break;
            }
        }

        else
        {
            $controller->show();
        }
    }

  /*  private function login()
    {
        require CONTROLLERS.DS.'LoginController.php';
        $controller = new LoginController();
        if(isset($_GET["Action"]))
        {
            switch($_GET["Action"]){
                case "list":
                    $controller->list();
                    break;

                case "add":
                    $controller->add();
                    break;
                
                default:
                    $controller->list();
                    break;
            }
        }

        else
        {
            $controller->list();
        }
    }

    //register et utilisateur
    
*/


}