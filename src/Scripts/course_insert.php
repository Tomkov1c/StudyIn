<?php 
session_start();

require_once "../Scripts/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $name = trim($_POST['name']);
    $website = trim($_POST['website']);
    $school_id = $_POST['school'];

    if (empty($name) || empty($school_id)) {
        echo "Please fill in all required fields.";
        exit();
    }

    $query = "INSERT INTO courses (name, website, school_id) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);

    if ($stmt->execute([$name, $website, $school_id])) {
        header("Location: ../admin/create_new.php");
        exit();
    } else {
        echo "Error: Could not create course.";
    }
} else {
    header("Location: ../admin/course.php");
    exit();
}

?>