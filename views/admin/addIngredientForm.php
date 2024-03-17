<style>
    form {
        margin-left: 20px; 
    }
</style>

<form action="index.php?Page=addIngredientForm" method="post"enctype="multipart/form-data">
    <label for="nom">Nom de l'ingrédient:</label>
    <input type="text" id="nom" name="nom" required><br><br>
    
    <label for="categorie">Catégorie:</label>
    <select id="categorie" name="categorie" required>
        <option value="legume">Légume</option>
        <option value="fruit">Fruit</option>
    </select><br><br>
    
    <label for="calories">Calories:</label>
    <input type="number" id="calories" name="calories" required><br><br>
    
    <label for="url_image">Image de l'ingrédient:</label>
    <input type="file" id="url_image" name="url_image" accept="image/*" required><br><br>
    
    <input type="submit" value="Ajouter l'ingrédient">
</form>
