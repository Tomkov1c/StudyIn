<?php
session_start();
require_once "../scripts/database.php"; 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userId = $_POST['user'];
    $roleId = $_POST['role'];

    if (empty($userId) || empty($roleId)) {
        echo "Please select both a user and a role.";
        exit();
    }

    $queryCurrentRole = "SELECT role_id FROM users WHERE id = ?";
    $stmt = $pdo->prepare($queryCurrentRole);
    $stmt->execute([$_SESSION['user_id']]);
    $currentUserRole = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($currentUserRole) {
        $currentRoleId = $currentUserRole['role_id'];

        $queryRoleCheck = "SELECT id, name FROM roles WHERE id > ?"; 
        $stmtRoleCheck = $pdo->prepare($queryRoleCheck);
        $stmtRoleCheck->execute([$currentRoleId]);
        $validRoles = $stmtRoleCheck->fetchAll(PDO::FETCH_ASSOC);

        $validRoleIds = array_column($validRoles, 'id');
        if (!in_array($roleId, $validRoleIds)) {
            echo "You do not have permission to assign this role.";
            exit();
        }

        $updateRoleQuery = "UPDATE users SET role_id = ? WHERE id = ?";
        $stmtUpdate = $pdo->prepare($updateRoleQuery);

        if ($stmtUpdate->execute([$roleId, $userId])) {
            echo "User has been successfully promoted.";
            header("Location: ../admin/dashboard.php");
            exit();
        } else {
            echo "Error: Unable to promote user.";
        }

    } else {
        echo "Error: Unable to retrieve your current role.";
    }

} else {
    echo "Invalid request.";
    exit();
}
?>
