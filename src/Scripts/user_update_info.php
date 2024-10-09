<?php

    include "../scripts/database.php";
    session_start();

    $query = "UPDATE `users` SET `first_name` = ?, `last_name` = ?, `phone_number` = ? WHERE `id` = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['name'], $_POST['surname'], $_POST['phone'], $_SESSION['user_id']]);

    header("Location: ../pages/account-settings.php");
    
?>