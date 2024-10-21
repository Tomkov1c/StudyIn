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

        if (isset($_SESSION['user_id'])) {
            $query = "SELECT r.name AS name FROM users u INNER JOIN roles r ON r.id = u.role_id WHERE u.id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_SESSION['user_id']]);
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                header("Location: ../pages/browse.php");
                die();
            }

            if(($result['name'] != "Owner" && $result['name'] != "Admin" )|| $result['name'] == null) {
                header("Location: ../pages/browse.php");
            }
        }
    ?>
    <title>User Promotion</title>
</head>
<body class="light bg-fixed bg-[var(--color-background)] w-screen h-fit m-0 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] xl:py-[75px] py-[100px] flex flex-col gap-[20px]">
    <form action="../scripts/promote_user.php" method="post" class="h-fit gap-[20px] flex flex-col">
        <?php 
            echo h3("User Promotion");
            echo p("Give higher privileges to users");
            echo divider(true);
            //
                $queryUsers = "SELECT id, first_name, last_name FROM users";
                $stmtUsers = $pdo->prepare($queryUsers);
                $stmtUsers->execute();
                $users = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);
                
                echo '<select name="user" id="user" class="h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-background)] px-[15px] py-[10px] outline outline-[var(--color-text)] outline-2 rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block mx-0.5 placeholder-gray-500 font-sans text-xl font-medium">';
                echo '<option value="">Select User</option>'; // Default option
                foreach ($users as $user) {
                    echo '<option value="' . $user['id'] . '">' . htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) . '</option>';
                }
                echo '</select>';
            //
            echo divider(false);
            //
                if (isset($_SESSION['user_id'])) {
                    $queryCurrentRole = "SELECT role_id FROM users WHERE id = ?";
                    $stmtCurrentRole = $pdo->prepare($queryCurrentRole);
                    $stmtCurrentRole->execute([$_SESSION['user_id']]);
                    $currentUserRole = $stmtCurrentRole->fetch(PDO::FETCH_ASSOC);
                
                    if ($currentUserRole) {
                        $currentRoleId = $currentUserRole['role_id'];
                
                        $queryRoles = "SELECT id, name FROM roles WHERE id > ?";
                        $stmtRoles = $pdo->prepare($queryRoles);
                        $stmtRoles->execute([$currentRoleId]);
                        $roles = $stmtRoles->fetchAll(PDO::FETCH_ASSOC);
                
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
<?php echo adminHeader() ?>
</html>
