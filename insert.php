<?php
require_once "../config/db.php";

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

$photo = null;
if (!empty($_FILES['photo']['name'])) {
    $photo = "uploads/" . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], "../" . $photo);
}

$sql = "INSERT INTO contacts (nom, prenom, telephone, email, photo)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $prenom, $telephone, $email, $photo]);

header("Location: list.php");
?>
