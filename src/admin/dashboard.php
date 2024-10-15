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

            if(($result['name'] != "Owner" && $result['name'] != "Admin" && $result['name'] != "Mod") || $result['name'] == null) {
                header("Location: ../pages/browse.php");
            }
        }
    ?>
    <title>Admin Dashboard</title>
</head>
<body class="light bg-fixed bg-[var(--color-background)] w-screen h-fit m-0 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] xl:py-[75px] py-[100px] flex flex-col gap-[50px]">
    <?php 
        echo h3("Choose from the Navigation bar.")
    ?>
</body>
<?php echo adminHeader() ?>
</html>
