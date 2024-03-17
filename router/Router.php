<?php
class Router {
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
                case "login":
                    $this->login();
                    break;
                case "register":
                    $this->register();
                    break;
                case "user":
                    $this->user();
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
    private function login() {
        require CONTROLLERS.DS.'LoginController.php';
        $controller = new LoginController();
        if(isset($_GET["Action"]))
        {
            
            switch($_GET["Action"])
            {
                case "checklogin":
                    $controller->checklogin();   
                    break;

                case "logout":
                    $controller->logout();
                    break;
                
                case "forgotten":
                    $controller->forgotten(); 
                    break;

                case "emailsent":
                    $controller->emailsent();
                    break;

                case "reset":
                    if(isset($_GET["token"]))
                    {
                        $controller->reset($_GET["token"]);
                    }  
                    else{
                        $controller->show(); 
                    }
                    break ; 

                case "passwordChanges":
                    $controller->passwordChanges();
                    break;
                default:
                    $controller->show();
                    break;
            }
        }

        $controller->show(); 
    }
    private function register() {
        require CONTROLLERS.DS.'RegisterController.php';
        $controller = new RegisterController();
        if(isset($_GET["Action"]))
        {
            
            switch($_GET["Action"])
            {
                case "registerProcess":
                    $controller->registerProcess();   
                    break;
                    
                default:
                    $controller->show();
                    break;
            }
        }
        $controller->show(); 
    }
    private function user(){
        require CONTROLLERS.DS.'UtilisateurController.php';
        $controller = new UtilisateurController();
        if(isset($_GET["Action"])){
            
            switch($_GET["Action"]){
                case "completeProfile":
                    $controller->completeProfile();   
                    break;

                default:
                    $controller->show();
                    break;
            }
        }
        $controller->show();
    }
}
