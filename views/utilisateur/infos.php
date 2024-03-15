<?php if(isset($_SESSION['email'])): ?> 
    <div>
        Bonjour <?php echo $_SESSION['pseudo']; ?> et bienvenue sur le site !

        Voici vos informations :

        <br> Taille : <?php echo $_SESSION['taille']; ?> cm.
        <br> Poids : <?php echo $_SESSION['poids']; ?> kg.
        <br> Statut utilisateur : <?php echo $_SESSION['type']; ?>.
    </div>

    <?php if (isset($_SESSION['complete_message'])) {
            echo "<div>" . $_SESSION['complete_message'] . "</div>";
            unset($_SESSION['complete_message']); 
    } ?>
    
    <?php if(isset($_SESSION['taille'], $_SESSION['poids']) && $_SESSION['taille'] == 0 && $_SESSION['poids'] == 0){
        if(isset($_POST['complete'])) { 
        ?>
            <form action="index.php?Main=user&Action=completeProfile" method="post">
            <br> <label for="taille"> Taille (cm) </label>
            <input type="text" name="taille" required="required" autocomplete="off"> 
            <br> <label for="poids"> Poids (kg) </label>
            <input type="text" name="poids" required="required" autocomplete="off">
            <br> <button type="submit"> Confirmer les informations </button>
            </form>
            
        <?php
       

        }
        else{
            ?>  
            <br> Certaines informations sont manquantes, nous vous invitons à les compléter ! 
            <form method="post"> <!-- Redirect vers la bonne function ! --> 
            <input type="hidden" name="complete" value="1">
            <button type="submit"> Compléter le profil </button> 
            </form>
        <?php
        }
    }
endif;
?>
