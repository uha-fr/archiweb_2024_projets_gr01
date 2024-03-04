<?php if($recette == null) { ?>
    <div class="alert alert-danger" role="alert">
        Aucune recette trouvée
    </div>
<?php } else { ?>
    <div class="col-lg-2 mb-4 col-6">
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
<?php } ?>