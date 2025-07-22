<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un contact</title>
</head>
<body>
    <h2>Ajouter un nouveau contact</h2>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        Nom : <input type="text" name="nom" required><br>
        Prénom : <input type="text" name="prenom" required><br>
        Téléphone : <input type="text" name="telephone" required><br>
        Email : <input type="email" name="email" required><br>
        Photo (optionnelle) : <input type="file" name="photo"><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
