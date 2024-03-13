<!-- view/UtilisateurView.php -->
<?php
include("./HTMLHead.php");
?>

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

    <form method="post">
        <input type="hidden" name="logout" value="1">
        <button type="submit">Déconnexion</button> 
    </form>
</div>



    
<?php else: 
       header('location: LoginView.php') ; 
       ?>
<?php endif; ?>

<?php
include("./HTMLEnd.php");
?>