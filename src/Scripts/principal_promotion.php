<?php
session_start();
require_once "../scripts/database.php"; // Include your database connection

// Check if the user is logged in as a principal
if (!isset($_SESSION['principal'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Step 1: Get the teacher (user) and the new role from the form submission
    if (isset($_POST['user']) && isset($_POST['role']) && !empty($_POST['user']) && !empty($_POST['role'])) {
        $user_id = $_POST['user'];
        $new_role_id = $_POST['role'];
    } else {
        echo "Error: Please select both a user and a role.";
        exit();
    }

    // Step 2: Verify that the user being promoted belongs to the principal's school
    $querySchool = "SELECT us.id FROM users_schools us 
                    JOIN schools s ON us.school_id = s.id 
                    WHERE us.user_id = ? 
                    AND s.principal_user_id = ? 
                    AND us.untill = '0000-00-00 00:00:00'";
    $stmtSchool = $pdo->prepare($querySchool);
    $stmtSchool->execute([$user_id, $_SESSION['user_id']]);
    $assignment = $stmtSchool->fetch(PDO::FETCH_ASSOC);

    if (!$assignment) {
        echo "Error: The selected user is not part of your school or their assignment has expired.";
        exit();
    }

    // Step 3: Update the user's role in the database
    $queryUpdateRole = "UPDATE users SET role_id = ? WHERE id = ?";
    $stmtUpdateRole = $pdo->prepare($queryUpdateRole);
    $result = $stmtUpdateRole->execute([$new_role_id, $user_id]);

    if ($result) {
        echo "User's role successfully updated.";
        // Optionally redirect to a success or confirmation page
        header("Location: ../principal/promotion.php"); // Adjust the redirect as needed
        exit();
    } else {
        echo "Error: Unable to update user's role.";
    }
} else {
    echo "Invalid request method.";
    exit();
}
?>
