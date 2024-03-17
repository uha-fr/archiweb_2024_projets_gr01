<div class="bg-body-tertiary p-5 rounded">

<form action="index.php?Main=login&Action=checklogin" method="post">
        <h2>Connexion</h2> 
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="you@example.com">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">
        <button type="submit">Envoyer</button>
    </form> 

    <?php if (isset($_SESSION['login_message'])) {
            echo "<div class='error-message'>" . $_SESSION['login_message'] . "</div>";
            unset($_SESSION['login_message']); 
        } else {
            echo "<div class='error-message'>Vous pouvez vous connecter</div>";
        } 
        ?> 
        
    <form action="index.php?Main=login&Action=forgotten" method="post">
        <h2>Mot de passe oublié ?</h2>
        <label for="email">Renseigner votre adresse mail</label>
        <input type="email" id="emailf" name="email" placeholder="you@example.com">
        <button type="submit">Confirmer la demande</button>
    </form>
    
    <!-- <a href="register.php"> Pas encore inscrit ?</a> --> 

</div>
