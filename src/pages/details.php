<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <?php include "../components/MustInclude.php"; 
        include "../scripts/database.php";

        if (isset($_GET['school'])) {
            $query = "SELECT * FROM schools WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([(int)$_GET['school']]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "User doesn't exist";
                die();
            }

        } else if (isset($_GET['course'])) {
            $query = "SELECT * FROM course WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([(int)$_GET['course']]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "User doesn't exist";
                die();
            }
            
        } else {
            
        }
    ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 p-[75px] flex flex-col gap-[25px]">
    <!-- <img class="object-cover w-full h-[683px] rounded-xl" src="" /> -->
    <div class="self-stretch h-fit px-[200px] py-2.5 flex-col justify-start items-start gap-2.5 flex">
        <?php 

            echo h2($result['name']);
            echo divider(true);
            echo eval($result['details_page_content']);
            echo divider();
            echo basicButton("Website", href: $result['website']);
        
        
        ?>
    </div>
</body>
</html> 