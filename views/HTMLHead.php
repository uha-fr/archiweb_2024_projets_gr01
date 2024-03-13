<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manger - Suivi et Recettes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <div class="container mx-1">
                <a class="navbar-brand" href="./home.php">Manger</a>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-5">
                        <li class="nav-item active">
                            <a class="nav-link mx-2" href="./home.php">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="./RecettesView.php">Recettes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="./IngredientsView.php">Ingrédients</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="./AdminView.php">Admin</a>
                        </li> 
                        -->
                        <li>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="navbar-nav ml-auto">
                        <?php 
                            session_start();
                            if(isset($_SESSION['email'])) {
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link mx-4" href="./UtilisateurView.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                        </svg>
                                    </a>
                                </li>';
                            } else {
                                echo '<li class="nav-item"><a class="nav-link mx-2" href="LoginView.php">Log In</a></li>';
                                echo '<li class="nav-item"><a class="nav-link mx-2" href="RegisterView.php">Sign Up</a></li>';
                            }
                        
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>