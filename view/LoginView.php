<!-- view/LoginView.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login.php</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
</head>
<body>
    <h1> LoginView.php </h1>

    <?php
        require_once "../controller/LoginController.php"; 
    ?>	

    <?php if(!isset($_SESSION['mail'])): ?>
        <form action="../controller/process/loginProcess.php" method="post">
            <h2>Connexion</h2> 
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="you@example.com">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
            <button type="submit">Envoyer</button>
        </form> 

        <!-- Implémentation future
            
        <form action="passwordfor.php" method="get">
            <h1>Mot de passe oublié ?</h1>
            <label for="email">Renseigner votre adresse mail</label>
            <input type="email" id="emailf" name="email" placeholder="you@example.com">
            <button type="submit">Confirmer la demande</button>
        </form>-->

    <?php else: 
        header('Location: home.php');?>
    <?php endif; ?>

</body>
</html>
