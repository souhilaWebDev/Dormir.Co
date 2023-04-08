<?php
    $database = new Database();
    $pdo = $database->connectDb();
    $result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);
    $user = $result->fetch(PDO::FETCH_ASSOC);

    // Vérification si l'utilisateur existe
    if (!$user) {
        echo "Utilisateur n'existe pas.";
        exit();
    }
?>