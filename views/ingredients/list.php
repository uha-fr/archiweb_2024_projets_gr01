<h1>Liste des ingrédients</h1>
<div class="container mb-5">
<form class="d-flex" action="./">
    <input class="form-control me-2" type="search" placeholder="Rechercher un ingrédient" aria-label="Search">
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

<?php if(isset($ingredients)): ?>
    <div class="row p-4">
    <?php foreach ($ingredients as $ingredient): ?>
        <div class="col-lg-2 mb-4 col-6">
                <div class="card magie" style="border-radius: 15px; border: 3px solid black !important;">
                    <div class="card-border">
                            <img src="<?php echo $ingredient->getUrlImg(); ?>"  class="card-img-top" alt="<?php echo $ingredient->getNom(); ?>" style="border-top-left-radius: 12px; border-top-right-radius: 12px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $ingredient->getNom(); ?></h5>
                        <p class="card-text"><?php echo $ingredient->getCategorie(); ?></p>
                        <p class="card-text"><?php echo $ingredient->getCalorie(); ?> cal</p>
                        <a href="../ingredients/<?php echo $ingredient->getId()?>" class="btn btn-primary">Voir ingrédient</a>
                    </div>
                </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <li>Aucun ingrédient trouvé</li>
<?php endif; ?>
</div>