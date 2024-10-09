<?php
    include_once "database.php";

    $query = "UPDATE `users` SET `profile_picture_path` = NULL WHERE `id` = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);

    header("Location: ../pages/account-settings.php")
?>