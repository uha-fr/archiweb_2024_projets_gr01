<!-- views/recettesView.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Liste des recettes</title>
</head>
<body>
    <h1>Liste des recettes</h1>
    <ul>
        <?php if(isset($recettes)): ?>
            <?php foreach ($recettes as $recette): ?>
                <li><?php echo $recette; ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucune recette trouvé</li>
        <?php endif; ?>
    </ul>
</body>
</html>
