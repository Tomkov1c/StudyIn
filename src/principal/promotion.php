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

        if (!isset($_SESSION['principal'])) {
            header("Location ../pages/login.php");
        }
    ?>
    <title>User Promotion</title>
</head>
<body class="light bg-fixed bg-[var(--color-background)] w-screen h-fit m-0 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] xl:py-[75px] py-[100px] flex flex-col gap-[20px]">
    <form action="../Scripts/principal_promotion.php" method="post" class="h-fit gap-[20px] flex flex-col">
        <?php 
            echo h3("User Promotion");
            echo p("Give higher privileges to users");
            echo divider(true);
            //

                if (!isset($_SESSION['user_id'])) {
                    header("Location: ../pages/login.php");
                    exit();
                }
                
                // Step 1: Get the school_id based on the currently logged-in user (principal)
                $querySchool = "SELECT id FROM schools WHERE principal_user_id = ?";
                $stmtSchool = $pdo->prepare($querySchool);
                $stmtSchool->execute([$_SESSION['user_id']]);
                $school = $stmtSchool->fetch(PDO::FETCH_ASSOC);
                
                if ($school) {
                    $school_id = $school['id'];  // Extract the school_id
                } else {
                    echo "Error: No school found for the current user.";
                    exit();
                }
                
                // Step 2: Fetch teachers associated with the current school whose 'until' in users_schools is '0000-00-00 00:00:00'
                $queryUsers = "
                    SELECT u.id, u.first_name, u.last_name 
                    FROM users u
                    JOIN roles r ON u.role_id = r.id
                    JOIN users_schools us ON u.id = us.user_id
                    WHERE r.name = 'Teacher' or r.name = 'Applicationist'
                    AND us.school_id = ?  -- Use the retrieved school_id
                    AND us.untill = '0000-00-00 00:00:00'  -- Only select teachers with no expiration in users_schools
                ";
                $stmtUsers = $pdo->prepare($queryUsers);
                $stmtUsers->execute([$school_id]);
                $users = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);
                
                // Step 3: Render the select dropdown for teachers
                echo '<select name="user" id="user" class="h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-background)] px-[15px] py-[10px] outline outline-[var(--color-text)] outline-2 rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block mx-0.5 placeholder-gray-500 font-sans text-xl font-medium">';
                echo '<option value="">Select Teacher</option>';  // Default option
                foreach ($users as $user) {
                    echo '<option value="' . $user['id'] . '">' . htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) . '</option>';
                }
                echo '</select>';
                
    
    
            //
            echo divider(false);
            //
                if (isset($_SESSION['user_id'])) {
                    // Fetch the current user's role ID
                    $queryCurrentRole = "SELECT role_id FROM users WHERE id = ?";
                    $stmtCurrentRole = $pdo->prepare($queryCurrentRole);
                    $stmtCurrentRole->execute([$_SESSION['user_id']]);
                    $currentUserRole = $stmtCurrentRole->fetch(PDO::FETCH_ASSOC);
                
                    if ($currentUserRole) {
                        $currentRoleId = $currentUserRole['role_id'];
                
                        // Get only "Teacher" and "Applicationist" roles
                        $queryRoles = "SELECT id, name FROM roles WHERE name IN ('Teacher', 'Applicationist')";
                        $stmtRoles = $pdo->prepare($queryRoles);
                        $stmtRoles->execute();
                        $roles = $stmtRoles->fetchAll(PDO::FETCH_ASSOC);
                
                        // Create the select box
                        echo '<select name="role" id="role" class="h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-background)] px-[15px] py-[10px] outline outline-[var(--color-text)] outline-2 rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block mx-0.5 placeholder-gray-500 font-sans text-xl font-medium">';
                        echo '<option value="">Select Role</option>';
                        foreach ($roles as $role) {
                            echo '<option value="' . $role['id'] . '">' . htmlspecialchars($role['name']) . '</option>';
                        }
                        echo '</select>';
                    } else {
                        echo 'Error: Unable to determine user\'s role.';
                    }
                } else {
                    echo 'Error: No user logged in.';
                }
            
                
                        
            //

            echo divider(false);
            echo divider(true);
            echo submitButton("Apply");
        ?>
    </form>
</body>
<?php echo principalHeader() ?>
</html>
