<?php
require_once "../config/db.php";

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

$photo = null;
if (!empty($_FILES['photo']['name'])) {
    $photo = "uploads/" . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], "../" . $photo);
    $sql = "UPDATE contacts SET nom=?, prenom=?, telephone=?, email=?, photo=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $telephone, $email, $photo, $id]);
} else {
    $sql = "UPDATE contacts SET nom=?, prenom=?, telephone=?, email=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $telephone, $email, $id]);
}

header("Location: list.php");
?>
