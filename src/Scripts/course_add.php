<?php 
session_start();
require_once "../Scripts/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $website = trim($_POST['website']);
    $user_id = $_SESSION['user_id'];

    if (empty($name)) {
        echo "Please fill in all required fields.";
        exit();
    }

    // Get the school ID by matching the logged-in user with the principal_user_id
    $querySchool = "SELECT id FROM schools WHERE principal_user_id = ?";
    $stmtSchool = $pdo->prepare($querySchool);
    $stmtSchool->execute([$user_id]);
    $school = $stmtSchool->fetch(PDO::FETCH_ASSOC);

    if (!$school) {
        echo "Error: No school found for this principal.";
        exit();
    }

    $school_id = $school['id'];

    // Insert the course with the school ID
    $queryInsertCourse = "INSERT INTO courses (name, website, school_id) VALUES (?, ?, ?)";
    $stmtInsertCourse = $pdo->prepare($queryInsertCourse);

    if ($stmtInsertCourse->execute([$name, $website, $school_id])) {
        header("Location: ../principal/dashboard.php");
        exit();
    } else {
        echo "Error: Could not create course.";
    }
} else {
    header("Location: ../principal/course.php");
    exit();
}
?>
