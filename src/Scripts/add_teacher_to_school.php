<?php
session_start();
require_once "../scripts/database.php";

if (!isset($_SESSION['principal'])) {
    header("Location: ../pages/browse.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['teacher_id']) && !empty($_POST['teacher_id'])) {
        $teacher_id = $_POST['teacher_id'];
    } else {
        echo "Error: No teacher selected.";
        exit();
    }

    $querySchool = "SELECT id FROM schools WHERE principal_user_id = ?";
    $stmtSchool = $pdo->prepare($querySchool);
    $stmtSchool->execute([$_SESSION['user_id']]);
    $school = $stmtSchool->fetch(PDO::FETCH_ASSOC);

    if (!$school) {
        echo "Error: Unable to find the school for this principal.";
        exit();
    }
    $school_id = $school['id'];

    $queryCheck = "
        SELECT * FROM users_schools 
        WHERE user_id = ? 
        AND school_id = ? 
        AND untill = '0000-00-00 00:00:00'";
    
    $stmtCheck = $pdo->prepare($queryCheck);
    $stmtCheck->execute([$teacher_id, $school_id]);
    $existingAssignment = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($existingAssignment) {
        echo "Error: This teacher is already assigned to your school.";
        exit();
    }

    $queryInsert = "
        INSERT INTO users_schools (user_id, school_id, untill) 
        VALUES (?, ?, '0000-00-00 00:00:00') 
        ON DUPLICATE KEY UPDATE untill = '0000-00-00 00:00:00'";
    
    $stmtInsert = $pdo->prepare($queryInsert);
    $result = $stmtInsert->execute([$teacher_id, $school_id]);

    if ($result) {
        echo "Teacher successfully assigned to your school.";
        header("Location: ../principal/add_users.php");
        exit();
    } else {
        echo "Error: Unable to assign teacher to the school.";
    }
} else {
    echo "Invalid request method.";
    exit();
}
?>
