<!-- views/recettesView.php -->

<!DOCTYPE html>
<html>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
        .magie:hover{
        filter: drop-shadow(20px 20px 20px rgba(0,0,0,0.6));
        transform: scale(1.1);
        }

        .magie{
        transition: all .1s ease-in-out;
        }
    </style>
<head>
    <title>Liste des recettes</title>
</head>
<body>
    <h1>Liste des recettes </h1>
<?php
        require_once '../controller/RecettesController.php';
        ?>
<div class="container mb-5">
        <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Rechercher une recette" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
                
  <div class="dropdown container">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Trier
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
        </form>
        </div>

        <?php if(isset($recettes)): ?>
            <div class="row p-4">
            <?php foreach ($recettes as $recette): ?>
                <div class="col-sm-2 mb-4">
                        <div class="card magie" style="border-radius: 15px; border: 3px solid black !important;">
                            <div class="card-border">
                                    <img src="<?php echo $recette->getUrlImg(); ?>"  class="card-img-top" alt="<?php echo $recette->getNom(); ?>" style="border-top-left-radius: 12px; border-top-right-radius: 12px">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $recette->getNom(); ?></h5>
                                <p class="card-text"><?php echo $recette->getDescription(); ?></p>
                                <p class="card-text"><?php echo $recette->getInstruction(); ?> </p>
                                <p class="card-text"><?php echo $recette->getDifficulte(); ?> </p>
                                <p class="card-text"><?php echo $recette->getCategorie(); ?> </p>
                                <p class="card-text"><?php echo $recette->getTmpPreparation(); ?> </p>
                                <p class="card-text"><?php echo $recette->getTmpCuisson(); ?> </p>
                                <p class="card-text"><?php echo $recette->getCalorie(); ?> cal </p>
                                <p class="card-text"><?php echo $recette->getVisibility(); ?> </p>
                                <p class="card-text"><?php echo $recette->getIdCreateur(); ?> </p>
                            </div>
            </div>
                        </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucune recette trouvé</li>
        <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
