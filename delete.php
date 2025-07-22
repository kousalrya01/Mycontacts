<?php
require_once "../config/db.php";

$id = $_GET['id'];

$sql = "DELETE FROM contacts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: list.php");
?>
