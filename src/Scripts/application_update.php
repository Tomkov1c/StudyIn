<?php
session_start();
require_once "../scripts/database.php";

// Ensure that the user is logged in as a principal
if (!isset($_SESSION['principal'])) {
    header("Location: ../pages/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $applicationId = isset($_POST['application_id']) ? $_POST['application_id'] : null;
    $action = isset($_POST['action']) ? $_POST['action'] : null;

    if (!$applicationId || !$action) {
        echo "Error: Application or action is missing.";
        exit();
    }

    // Determine approval status
    $approved = null;
    if ($action === 'approve') {
        $approved = 1;  // Approved
    } elseif ($action === 'decline') {
        $approved = 0;  // Declined
    }

    // Step 1: Fetch the school ID of the current logged-in principal
    $querySchool = "SELECT id FROM schools WHERE principal_user_id = ?";
    $stmtSchool = $pdo->prepare($querySchool);
    $stmtSchool->execute([$_SESSION['user_id']]);
    $school = $stmtSchool->fetch(PDO::FETCH_ASSOC);

    if (!$school) {
        echo "Error: No school found for the current user.";
        exit();
    }

    $school_id = $school['id'];  // Extract the school_id

    // Step 2: Verify if the application belongs to a course from the principal's school
    $queryApplication = "
        SELECT a.id
        FROM aplications a
        JOIN courses c ON a.course_id = c.id
        WHERE a.id = ?
        AND c.school_id = ?  -- Ensure the course belongs to the principal's school
    ";
    $stmtApplication = $pdo->prepare($queryApplication);
    $stmtApplication->execute([$applicationId, $school_id]);
    $application = $stmtApplication->fetch(PDO::FETCH_ASSOC);

    if (!$application) {
        echo "Error: Application does not belong to a course in your school or doesn't exist.";
        exit();
    }

    // Step 3: Update the application's approval status
    $queryUpdate = "UPDATE aplications SET approved = ? WHERE id = ?";
    $stmtUpdate = $pdo->prepare($queryUpdate);

    if ($stmtUpdate->execute([$approved, $applicationId])) {
        // Redirect back to the page with success message
        header("Location: ../principal/aplications.php");
        exit();
    } else {
        echo "Error: Could not update the application.";
    }
}
?>
