<!-- views/IngredientsView.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Liste des ingrédients</title>
</head>
<body>
    <h1>Liste des ingrédients</h1>
    <ul>
        <?php if(isset($ingredients)): ?>
            <?php foreach ($ingredients as $ingredient): ?>
                <li><?php echo $ingredient; ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Aucun ingrédient trouvé</li>
        <?php endif; ?>
    </ul>
</body>
</html>
