<?php
$host = "sql206.infinityfree.com";      // Remplacer ici
$user = "if0_39536268";         // Remplacer ici
$password = "F4sNMTNHwKX";  // Remplacer ici
$dbname = "if0_39536268_XXX"; // Remplacer ici

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>

