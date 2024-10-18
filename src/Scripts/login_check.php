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
            include "get_pfp.php";
            $_SESSION['pfp'] = $profile_picture_path;
            $_SESSION['user_name'] = $user['first_name'];
            $_SESSION['user_surname'] = $user['last_name'];
            $_SESSION['user_role'] = $user['role_id'];

            if ($user['role_id'] == 'Principal') {
                $queryPrincipal = "SELECT id FROM schools WHERE principal_user_id = ?";
                $stmtPrincipal = $pdo->prepare($queryPrincipal);
                $stmtPrincipal->execute([$user['id']]);
                
                if ($stmtPrincipal->rowCount() == 1) {
                    $school = $stmtPrincipal->fetch();
                    $_SESSION['user.isPrincipal'] = $school['id'];
                } else {
                    $_SESSION['user.isPrincipal'] = false;
                }
            } else {
                $_SESSION['user.isPrincipal'] = false;
            }
            $_SESSION['user.isPrincipal'] = $user['role_id'];
            header("Location: ../pages/browse.php");
            die();
        }
    }
}

header("Location: ../pages/login.php");
?>
