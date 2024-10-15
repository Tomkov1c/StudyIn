<?php
include_once 'database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

$queryCheckPrincipal = "SELECT id, name FROM schools WHERE principal_user_id = ?";
            $stmtCheckPrincipal = $pdo->prepare($queryCheckPrincipal);
            $stmtCheckPrincipal->execute([$_SESSION['user_id']]);
            $school = $stmtCheckPrincipal->fetch(PDO::FETCH_ASSOC);

$schoolId = $school['id']; // Make sure to include this hidden input in your form

// Update school details
$queryUpdateSchool = "UPDATE schools SET name = ?, type_id = ?, city_id = ?, adress = ?, email = ?, phone_number = ?, website = ?, logo_path = ?, banner_path = ? WHERE id = ?";
$stmtUpdateSchool = $pdo->prepare($queryUpdateSchool);
$stmtUpdateSchool->execute([
    $_POST['name'],
    $_POST['type'],
    $_POST['city'],
    $_POST['address'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['website'],
    $_POST['logo_path'],
    $_POST['banner_path'],
    $schoolId
]);
header("Location: ../principal/dashboard.php"); 
exit();
?>
