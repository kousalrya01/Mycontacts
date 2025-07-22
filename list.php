<?php
require_once "../config/db.php";

$sql = "SELECT * FROM contacts ORDER BY id DESC";
$contacts = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des contacts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Liste des contacts</h2>
    <form action="search.php" method="get">
        <input type="text" name="q" placeholder="Rechercher par nom ou prénom">
        <input type="submit" value=" Rechercher">
    </form>

    <a href="add.php"> Ajouter un nouveau contact</a>

    <table border="1">
        <tr>
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td>
                <?php if ($contact['photo']): ?>
                    <img src="../<?= htmlspecialchars($contact['photo']) ?>" width="60">
                <?php else: ?>
                    Aucun
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($contact['nom']) ?></td>
            <td><?= htmlspecialchars($contact['prenom']) ?></td>
            <td><?= htmlspecialchars($contact['telephone']) ?></td>
            <td><?= htmlspecialchars($contact['email']) ?></td>
            <td>
                <a href="edit.php?id=<?= $contact['id'] ?>"> Modifier</a> 
                <a href="delete.php?id=<?= $contact['id'] ?>" onclick="return confirm('Confirmer la suppression ?')">🗑️ Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
