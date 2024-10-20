<?php

if (!empty($email) && !empty($pass)) {
    $query = "SELECT * FROM users WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['user_id']]);

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        
        if (sha1($pass . $salt) == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            include "get_pfp.php";
            $_SESSION['pfp'] = $profile_picture_path;
            $_SESSION['user_name'] = $user['first_name'];
            $_SESSION['user_surname'] = $user['last_name'];
            $_SESSION['user_role'] = $user['role_id'];

            $queryPrincipal = "SELECT id FROM schools WHERE principal_user_id = ?";
            $stmtPrincipal = $pdo->prepare($queryPrincipal);
            $stmtPrincipal->execute([$user['id']]);
            
            if ($stmtPrincipal->rowCount() == 1) {
                $school = $stmtPrincipal->fetch();
                $_SESSION['user.isPrincipal'] = $school['id'];
            } else {
                $_SESSION['user.isPrincipal'] = false;
            }
            
        }
    }
}
?>
