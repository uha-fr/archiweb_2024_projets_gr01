<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manger - Suivi et Recettes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 ">
            <div class="container mx-1">
                <a class="navbar-brand mr-5" href="index.php">Manger</a>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ml-3" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="index.php?Main=recettes">Recettes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="index.php?Main=ingredients">Ingrédients</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="<?php //echo WEBROOT."/admin";?>">Admin</a>
                        </li> 
                        -->
                        <li>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <?php 
                            if(session_status() !== PHP_SESSION_ACTIVE) {
                                session_start();
                            }
                            if(isset($_SESSION['email'])) {
                                echo '
                                        <li class="nav-item">
                                            <a class="nav-link mx-4" href="index.php?Main=user">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                                </svg>
                                            </a>
                                        </li>';
                            } else {
                                
                                echo '<li class="nav-item justify-content-end"><a class="nav-link mx-2" href="index.php?Main=login">Log In</a></li>';
                                echo '<li class="nav-item justify-content-end"><a class="nav-link mx-2" href="index.php?Main=register">Sign Up</a></li>';
                            }
                        
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php require VIEWS.DS.$ressource.DS.$methode.'.php'; ?>
    <footer class="bg-dark text-white py-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-left"> <!-- Colonne pour le paragraphe -->
                <p>&copy; 2024 Manger. Tous droits réservés.</p>
            </div>
            <div class="col-md-6 text-right"> <!-- Colonne pour la liste -->
                <ul class="nav">
                    <li class="nav-item"><a href="index.php" class="nav-link px-2 text-body-secondary">Accueil</a></li>
                    <li class="nav-item"><a href="index.php?Main=recettes" class="nav-link px-2 text-body-secondary">Recettes</a></li>
                    <li class="nav-item"><a href="index.php?Main=ingredients" class="nav-link px-2 text-body-secondary">Ingrédients</a></li>
                    <li class="nav-item"><a href="index.php?Main=admin" class="nav-link px-2 text-body-secondary">Admin</a></li>
                    <li class="nav-item"><a href="index.php?Main=login&Action=logout" class="nav-link px-2 text-body-secondary">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


    <!-- Bootstrap JS et jQuery (nécessaires pour le fonctionnement des composants Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>
