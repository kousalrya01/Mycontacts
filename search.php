<?php
require_once "../config/db.php";

$q = $_GET['q'] ?? '';
$sql = "SELECT * FROM contacts WHERE nom LIKE ? OR prenom LIKE ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(["%$q%", "%$q%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Résultats de la recherche</title>
</head>
<body>
    <h2>Résultats pour : "<?= htmlspecialchars($q) ?>"</h2>
    <a href="list.php">Retour à la liste</a>
    <ul>
        <?php foreach ($results as $contact): ?>
            <li><?= $contact['prenom'] . " " . $contact['nom'] ?> - <?= $contact['telephone'] ?> - <a href="edit.php?id=<?= $contact['id'] ?>">Modifier</a></li>
        <?php endforeach; ?>
        <?php if (count($results) === 0): ?>
            <li>Aucun résultat trouvé.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
