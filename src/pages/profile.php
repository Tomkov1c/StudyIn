<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include "../components/MustInclude.php";
        
        if (isset($_GET['user'])) {
            session_start();
            include "../scripts/database.php";

            $query = "SELECT * FROM users WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([(int)$_GET['user']]);
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "User doesn't exist";
                die();
            }

            $pfp = $result['profile_picture_path'] != null ? $result['profile_picture_path'] : "../images/default_pfp.png";
        }
    ?>
    <title><?php echo htmlspecialchars($result['first_name'] . " " . $result['last_name']); ?></title>
</head>
<body class="light bg-fixed bg-[url('../images/light-background.svg')] bg-[var(--color-background)] w-screen m-0 p-[75px] flex flex-col gap-[100px]">

    <section class="w-full h-full p-[50px] bg-[var(--color-terciary50)] rounded-md border-2 border-[var(--color-text)] flex-col justify-start items-center gap-[90px] inline-flex">
        <div class="self-stretch h-[188px] justify-start items-center gap-10 inline-flex">
            <img class="w-[179px] h-[179px] rounded-[96px] border-2 border-[var(--color-text)]" src="<?php echo htmlspecialchars($pfp); ?>" />
            <div class="grow shrink basis-0 self-stretch flex-col justify-center items-start gap-1 inline-flex">
                <?php echo h3(htmlspecialchars($result['first_name'] . " " . $result['last_name'])); ?>
            </div>
            <?php if($_SESSION['user_id'] == $_GET['user']){
                echo basicButton("Settings", href: "account-settings.php");
                echo iconButton("fa-solid fa-right-from-bracket my-auto py-[4px] block", href: "../scripts/user_logout.php");
                }?>
        </div>
        
        <div class="self-stretch h-fit flex-col justify-center items-start gap-5 flex overflow-hidden">
            <?php echo h4("History - Courses"); ?>
            <div class="w-full self-stretch justify-start items-start gap-x-[2.5%] gap-y-[2.5%] flex flex-wrap">
                <?php 
                    $query = "SELECT co.name as courses_name,
                                    s.name as school_name,
                                    uc.from as school_from,
                                    uc.untill as school_until,
                                    s.school_image_path as school_image_path                   
                                FROM users u 
                                INNER JOIN users_courses uc ON u.id = uc.user_id 
                                INNER JOIN course co ON uc.course_id = co.id 
                                INNER JOIN schools s ON co.school_id = s.id 
                                INNER JOIN city c ON s.city_id = c.id 
                                INNER JOIN countries ct ON c.county_id = ct.id 
                                WHERE u.id = ?";

                    $stmt = $pdo->prepare($query);
                    $stmt->execute([(int)$_GET['user']]);
                    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($userData as $data) {
                        echo display(
                            htmlspecialchars($data['courses_name']), 
                            organizer: htmlspecialchars($data['school_name']), 
                            year: htmlspecialchars(date("Y", strtotime($data['school_from'])) . " - " . ($data['school_until'] != '0000-00-00 00:00:00' ? date("Y", strtotime($data['school_until'])) : 'Present')), 
                            image: htmlspecialchars($data['school_image_path'])
                        );
                    }
                ?>
            </div>
            <?php echo divider(); ?>
            <?php echo h4("History - Schools"); ?>
            <div class="w-full self-stretch justify-start items-start gap-x-[2.5%] gap-y-[2.5%] flex flex-wrap">
                <?php 
                    $query = "SELECT s.name as school_name,
                                    us.from as school_from,
                                    us.untill as school_until,
                                    s.school_image_path as school_image_path                   
                                FROM users u 
                                INNER JOIN users_schools us ON u.id = us.user_id 
                                INNER JOIN schools s ON us.school_id = s.id 
                                INNER JOIN city c ON s.city_id = c.id 
                                INNER JOIN countries ct ON c.county_id = ct.id 
                                WHERE u.id = ?";

                    $stmt = $pdo->prepare($query);
                    $stmt->execute([(int)$_GET['user']]);
                    $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($userData as $data) {
                        echo display(
                            htmlspecialchars($data['school_name']), 
                            organizer: "",
                            year: htmlspecialchars(date("Y", strtotime($data['school_from'])) . " - " . ($data['school_until'] != '0000-00-00 00:00:00' ? date("Y", strtotime($data['school_until'])) : 'Present')), 
                            image: htmlspecialchars($data['school_image_path'])
                        );
                    }
                ?>
            </div>
        </div>
    </section>

</body>
</html>
