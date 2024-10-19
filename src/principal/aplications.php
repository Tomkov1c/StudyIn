<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        session_start();
        include_once "../components/MustInclude.php";
        include_once "../scripts/database.php";
        include_once "../scripts/get_pfp.php";

        // Redirect if not logged in as principal
        if ($_SESSION['user_role'] != 4 && $_SESSION['user.isPrincipal'] == false) {
            header("Location: ../pages/browse.php");
            exit();
        }
    ?>
    <title>Approve/Decline Applications</title>
</head>
<body class="light bg-fixed bg-[var(--color-background)] w-screen h-fit m-0 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] xl:py-[75px] py-[100px] flex flex-col gap-[20px]">
    <form action="../scripts/application_update.php" method="post" class="h-fit gap-[20px] flex flex-col">
        <?php 
            echo h3("Approve or Decline Course Applications");
            echo p("Review and manage pending course applications.");
            echo divider(true);

            // Step 1: Get the school_id based on the currently logged-in user (principal)
            $querySchool = "SELECT id FROM schools WHERE principal_user_id = ?";
            $stmtSchool = $pdo->prepare($querySchool);
            $stmtSchool->execute([$_SESSION['user_id']]);
            $school = $stmtSchool->fetch(PDO::FETCH_ASSOC);
            
            if ($school) {
                $school_id = $school['id'];
            } else {
                $querySchool = "SELECT school_id FROM users_schools WHERE user_id = ?";
                $stmtSchool = $pdo->prepare($querySchool);
                $stmtSchool->execute([$_SESSION['user_id']]);
                $school = $stmtSchool->fetch(PDO::FETCH_ASSOC);

                if ($school) {
                    $school_id = $school['school_id'];
                }
            }

            // Step 2: Fetch applications where the course belongs to the current school and applications are pending approval
            $queryApplications = "
                SELECT a.id, u.first_name, u.last_name, c.name AS course_name, a.date 
                FROM aplications a
                JOIN users u ON a.from_user_id = u.id
                JOIN courses c ON a.course_id = c.id
                WHERE c.school_id = ?  -- Only fetch applications for courses in the current principal's school
                AND a.approved IS NULL  -- Only get pending applications
            ";
            $stmtApplications = $pdo->prepare($queryApplications);
            $stmtApplications->execute([$school_id]);
            $applications = $stmtApplications->fetchAll(PDO::FETCH_ASSOC);

            // Step 3: Render the applications
            if (count($applications) > 0) {
                echo '<select name="application_id" id="application_id" class="h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-background)] px-[15px] py-[10px] outline outline-[var(--color-text)] outline-2 rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block mx-0.5 placeholder-gray-500 font-sans text-xl font-medium">';
                echo '<option value="">Select Application</option>';  // Default option
                foreach ($applications as $app) {
                    $userInfo = htmlspecialchars($app['first_name'] . ' ' . $app['last_name']);
                    $courseInfo = htmlspecialchars($app['course_name']);
                    $applicationDate = htmlspecialchars($app['date']);
                    echo '<option value="' . $app['id'] . '">' . $userInfo . ' - ' . $courseInfo . ' (' . $applicationDate . ')</option>';
                }
                echo '</select>';
                
                // Step 4: Buttons to approve or decline
                echo '<div class="flex gap-4">';
                echo '<button type="submit" name="action" value="approve" class="bg-green-500 text-white px-4 py-2 rounded-md">Approve</button>';
                echo '<button type="submit" name="action" value="decline" class="bg-red-500 text-white px-4 py-2 rounded-md">Decline</button>';
                echo '</div>';
            } else {
                echo '<p>No pending applications found for courses in your school.</p>';
            }

            echo divider(false);
        ?>
    </form>
</body>
<?php 
if ($_SESSION['user.isPrincipal'] != false) {
    echo principalHeader();
} else {
    echo userHeader(true, true, true, false, "../pages/browse.php", true, true, true);
}
?>

</html>
