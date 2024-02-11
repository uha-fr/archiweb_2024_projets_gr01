<!-- view/UtilisateurView.php -->

<!DOCTYPE html>
<html>
<head>
    <title> UtilisateurView.php</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MANGER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/archiweb_2024_projets_gr01/view/home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/archiweb_2024_projets_gr01/view/IngredientsView.php">Ingrédients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/archiweb_2024_projets_gr01/view/RecettesView.php">Recettes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/archiweb_2024_projets_gr01/view/UtilisateurView.php">Espace Utilisateur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/archiweb_2024_projets_gr01/view/AdminView.php">Admin</a>
            </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
    <h1> UtilisateurView.php </h1>


    <?php
        require_once "../controller/UtilisateurController.php"; 
    ?>	

    <?php
    if(isset($_SESSION['email'])): ?> 
    <div>
        Bonjour <?php echo $_SESSION['pseudo']; ?> et bienvenue sur le site !

        Voici vos informations :

        <br> Taille : <?php echo $_SESSION['taille']; ?> cm.
        <br> Poids : <?php echo $_SESSION['poids']; ?> kg.
        <br> Statut utilisateur : <?php echo $_SESSION['type']; ?>.

    <?php 

    if(isset($_GET['comcode'])){
        $err = htmlspecialchars($_GET['comcode']);
        displayErrorMessage($err);
    }

    if(isset($_SESSION['taille'], $_SESSION['poids']) && $_SESSION['taille'] == 0 && $_SESSION['poids'] == 0){
        if(isset($_POST['complete'])) { // Ouverture de la balise PHP avec la condition if
        ?>
            <form action="../controller/process/completeProcess.php" method="post">
                <br> <label for="taille"> Taille (cm) </label>
                <input type="text" name="taille" required="required" autocomplete="off"> 
                <br> <label for="poids"> Poids (kg) </label>
                <input type="text" name="poids" required="required" autocomplete="off">
                <br> <button type="submit"> Confirmer les informations </button>
            </form>
        <?php
        }
        else{
        ?>       <br> Certaines informations sont manquantes, nous vous invitons à les compléter ! 
                <form method="post">
                <input type="hidden" name="complete" value="1">
                <button type="submit"> Compléter le profil </button> 
            </form>
            <?php
            }
    }
    ?>
    
        <form method="post">
            <input type="hidden" name="logout" value="1">
            <button type="submit">Déconnexion</button> 
        </form>
    </div>

    
<?php else: 
       header('location: LoginView.php') ; 
       ?>
<?php endif; ?>