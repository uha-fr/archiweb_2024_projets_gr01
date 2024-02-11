<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manger - Suivi et Recettes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .magie:hover{
        filter: drop-shadow(20px 20px 20px rgba(0,0,0,0.6));
        transform: scale(1.1);
        }

        .magie{
        transition: all .1s ease-in-out;
        }

        body{
            margin: 0;
            padding: 0;
        }

    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <div class="container">
                <a class="navbar-brand" href="./home.php">Manger</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link p-1 mx-1" href="./home.php">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-1 mx-1" href="./RecettesView.php">Recettes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-1 mx-1" href="./IngredientsView.php">Ingrédients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-1 mx-1" href="./UtilisateurView.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-1 mx-1" href="./AdminView.php">Admin</a>
                        </li>

                    </ul>
                    <form class="d-flex p-1 mx-1" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>