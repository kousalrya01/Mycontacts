<?php
require_once "../config/db.php";

$id = $_GET['id'];
$sql = "SELECT * FROM contacts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$contact = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier le contact</title>
</head>
<body>
    <h2>Modifier le contact</h2>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        Nom : <input type="text" name="nom" value="<?= $contact['nom'] ?>" required><br>
        Prénom : <input type="text" name="prenom" value="<?= $contact['prenom'] ?>" required><br>
        Téléphone : <input type="text" name="telephone" value="<?= $contact['telephone'] ?>" required><br>
        Email : <input type="email" name="email" value="<?= $contact['email'] ?>" required><br>
        Photo : <input type="file" name="photo"><br>
        (Photo actuelle : <?= $contact['photo'] ? '<img src="../' . $contact['photo'] . '" width="50">' : 'Aucune' ?>)<br>
        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>
