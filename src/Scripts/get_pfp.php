<?php
    $query = "SELECT profile_picture_path FROM users WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $profile_picture_path = $result['profile_picture_path'];
    } else {
        $profile_picture_path = "../images/default_pfp.jpg";
    }
?>