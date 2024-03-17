<?php if(isset($user)): ?>
<div>
    Bonjour <?php echo $user->getPseudo(); ?> et bienvenue sur le site !

    <br> Voici vos informations :
    <br> - Taille : <?php echo $user->getTaille(); ?> cm.
    <br> - Poids : <?php echo $user->getPoids(); ?> kg.
    
    <?php if ($user->getTaille() != 0 && $user->getPoids() != 0) : ?>
    <br> - IMC : <?php echo round($user->getPoids() / pow($user->getTaille() / 100, 2)); ?>.
    <?php endif; ?>
    <br> - Statut utilisateur : <?php echo $user->getType(); ?>.

    
</div>

<?php
    // Ici on affiche les messages concernant la complétion du profil. 
    if (isset($_SESSION['complete_message'])) {
        echo "<br> <div>" . $_SESSION['complete_message'] . "</div>";
        unset($_SESSION['complete_message']); 
    } ?>
    
    <?php if($user->getTaille() == 0 && $user->getPoids() == 0){
        if(isset($_POST['complete'])) { ?>
            <form action="index.php?Main=user&Action=completeProfile" method="post">
            <br> <label for="taille"> Taille (cm) </label>
            <input type="text" name="taille" required="required" autocomplete="off"> 
            <br> <label for="poids"> Poids (kg) </label>
            <input type="text" name="poids" required="required" autocomplete="off">
            <br> <button type="submit"> Confirmer les informations </button>
        </form>    
        <?php }        
        else{
            ?>  
            <br> Certaines informations sont manquantes, nous vous invitons à les compléter ! 
            <form method="post">
            <input type="hidden" name="complete" value="1">
            <button type="submit"> Compléter le profil </button> 
            </form>
        <?php
        }
    }
?>
    
<br> Voici vos recettes : <br> 

<?php if(isset($recettes) && !empty($recettes)): ?>
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
                        <a href="index.php?Main=recettes&Action=showone&id=<?php echo $recette->getId(); ?>" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No recipes found.</p>
<?php endif; ?>
    
<?php endif; ?>
