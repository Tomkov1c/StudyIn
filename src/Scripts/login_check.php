<?php
session_start();
include_once 'database.php';
$email = $_POST['email'];
$pass = $_POST['password'];

if (!empty($email) && !empty($pass)) {
    $query = "SELECT * FROM users WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        
        if (sha1($pass . $salt) == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../pages/browse.php");
            die();
        }
    }
}

header("Location: login.php");
?>
