<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        session_start();
        include_once "../components/MustInclude.php";
        include_once "../scripts/database.php";

        // Redirect to login if the user is not logged in as principal
        if (!isset($_SESSION['user.isPrincipal'])) {
            header("Location: ../pages/login.php");
            exit();
        }

        // Fetch principal's school_id
        $querySchool = "SELECT id FROM schools WHERE principal_user_id = ?";
        $stmtSchool = $pdo->prepare($querySchool);
        $stmtSchool->execute([$_SESSION['user_id']]);
        $school = $stmtSchool->fetch(PDO::FETCH_ASSOC);

        if (!$school) {
            echo "Error: No school found for the current principal.";
            exit();
        }
        $school_id = $school['id']; // Extract the school_id
    ?>
    <title>Add Teacher to School</title>
</head>
<body class="light bg-fixed bg-[var(--color-background)] w-screen h-fit m-0 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] xl:py-[75px] py-[100px] flex flex-col gap-[20px]">

    <form action="../scripts/add_teacher_to_school.php" method="POST" class="h-fit gap-[20px] flex flex-col">
        <?php 
            echo h3("Add Teacher to School");
            echo p("Select a teacher to add them to your school");
            echo divider(true);

            // Fetch all teachers who are not currently assigned to this principal's school
            $queryTeachers = "
                SELECT u.id, u.first_name, u.last_name
                FROM users u
                JOIN roles r ON u.role_id = r.id
                LEFT JOIN users_schools us ON u.id = us.user_id AND us.school_id = ?
                WHERE r.name = 'Teacher'
                AND (us.school_id IS NULL OR us.untill != '0000-00-00 00:00:00') AND (u.id != " . $_SESSION["user_id"] . ")
            ";
            $stmtTeachers = $pdo->prepare($queryTeachers);
            $stmtTeachers->execute([$school_id]);
            $teachers = $stmtTeachers->fetchAll(PDO::FETCH_ASSOC);

            if (count($teachers) > 0) {
                echo '<select name="teacher_id" id="teacher_id" class="h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-background)] px-[15px] py-[10px] outline outline-[var(--color-text)] outline-2 rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block mx-0.5 placeholder-gray-500 font-sans text-xl font-medium">';
                echo '<option value="">Select Teacher</option>';  // Default option
                foreach ($teachers as $teacher) {
                    echo '<option value="' . $teacher['id'] . '">' . htmlspecialchars($teacher['first_name'] . ' ' . $teacher['last_name']) . '</option>';
                }
                echo '</select>';
                echo divider(false);
                echo submitButton("Add Teacher");
            } else {
                echo p("No available teachers to assign to your school.");
            }
        ?>
    </form>
</body>
<?php echo principalHeader(); ?>
</html>
