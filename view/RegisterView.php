<!-- view/RegisterView.php -->
<?php
include("./HTMLHead.php");
?>
<h1> RegisterView.php </h1>

<?php
    require_once "../controller/RegisterController.php"; 
?>	

<form action="../controller/process/registerProcess.php" method="post">
    <br> <label for="pseudo"> Pseudonyme </label>
        <input type="text" name="pseudo" required="required" autocomplete="off">
    <br> <label for="email"> Email </label>
        <input type="email" name="email" required="required" autocomplete="off">
    <br> <label for="password"> Mot de passe </label>
        <input type="password" name="password" required="required" autocomplete="off">
    <br> <label for="password2"> Confirmation du mot de passe </label>
        <input type="password" name="password2" required="required" autocomplete="off">
    <br> <button type="submit">Confirmer l'inscription</button>
</form>

</body>
</html>

<?php
include("./HTMLEnd.php");
?>