<div class="bg-body-tertiary p-5 rounded">

<?php 
    if (isset($_SESSION['register_message'])) {
        echo "<div>" . $_SESSION['register_message'] . "</div>";
        unset($_SESSION['register_message']); 
    }
?> 

<form action="index.php?Main=register&Action=registerProcess" method="post">
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

</div>