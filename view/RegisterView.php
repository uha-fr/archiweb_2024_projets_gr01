<!-- view/RegisterView.php -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="NoS1gnal"/>
        <title> RegisterView.php </title>
</head>
<body>
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