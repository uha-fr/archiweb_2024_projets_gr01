<!-- 2ème étape de la réinitialisation du mot de passe -->

<div> <p> Veuillez saisir votre nouveau mot de passe dans le champ ci-dessous. 
    <br>Assurez-vous de choisir un mot de passe sécurisé, 
    comprenant au moins huit caractères et combinant des lettres majuscules et minuscules, 
    des chiffres et des symboles pour garantir la sécurité de votre compte. </p> </div>

    <?php if(isset($_SESSION['pwd_message'])): ?>
        <div>
            <?php echo $_SESSION['pwd_message']; ?>
        </div>
    <?php endif; ?>
    

<form action="index.php?Main=login&Action=passwordChanges" method="post">
        <label for="password">Nouveau mot de passe : </label>
        <input type="password" name="password" required="required" autocomplete="off">
        <br>
        <label for="c_password">Confirmez le nouveau mot de passe : </label>
        <input type="password" name="c_password"  required="required" autocomplete="off">
        <br>
        <input type="hidden" name="email" value="<?php echo $email; // On garde l'email ?>">
        
       <p> Une fois que vous avez saisi votre nouveau mot de passe, cliquez sur le bouton "Confirmer" pour finaliser la réinitialisation. </p>
        <button type="submit"> Confirmer  </button>
    </form>  
