<?php if($ingredient == null) { ?>
    <div class="alert alert-danger" role="alert">
        Aucun ingrédient trouvé
    </div>
<?php } else { ?>
    <div class="col-lg-2 mb-4 col-6">
        <div class="card magie" style="border-radius: 15px; border: 3px solid black !important;">
            <div class="card-border">
                    <img src="<?php echo $ingredient->getUrlImg(); ?>"  class="card-img-top" alt="<?php echo $ingredient->getNom(); ?>" style="border-top-left-radius: 12px; border-top-right-radius: 12px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $ingredient->getNom(); ?></h5>
                    <p class="card-text"><?php echo $ingredient->getCategorie(); ?></p>
                    <p class="card-text"><?php echo $ingredient->getCalorie(); ?> cal</p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
