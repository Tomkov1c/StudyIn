<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include_once "../components/MustInclude.php";
        
        if (isset($_GET['user'])) {
            session_start();
            include_once "../scripts/database.php";

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
<body class="light bg-fixed bg-[var(--color-background)] w-screen m-0 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] py-[75px] flex flex-col gap-[50px]">
    <?php if($_SESSION['user_id'] == $_GET['user']){ ?>
            <div class="self-stretch h-fit rounded-md flex-col justify-start items-center gap-[50px] flex">
                <div class="self-stretch p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] justify-start items-center gap-10 xl:inline-flex">
                    <div class="flex gap-10 w-full mb-10 xl:mb-0">
                        <img class="w-[179px] h-[179px] rounded-[96px] border-2 border-[var(--color-text)]" src="<?php echo $pfp ?>" />
                        <?php echo h3(htmlspecialchars($result['first_name'] . " " . $result['last_name']), true, additionalClasses: "my-auto") ?>
                    </div>                  
                </div>
            </div>
            <div class="self-stretch justify-start items-start gap-[50px] xl:inline-flex">
                <div class="w-full grow shrink basis-0 p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] mb-[50px] xl:mb-[0px] flex-col justify-start items-start gap-2.5 inline-flex">
                    <?php 
                        echo h4("Notifications");
                        echo divider(false);

                        $query = "SELECT * FROM notifications WHERE to_user_id = ?";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$_SESSION['user_id']]);

                        $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (!is_array($notifications)) {
                            echo "Error: Expected an array but got something else.<br>";
                            var_dump($notifications);
                            exit;
                        }

                        foreach ($notifications as $notification) {
                            if (is_array($notification)) {
                                echo notification($notification['title'], $notification['message'], "w-full", $notification['id']);
                            } else {
                                echo "Error: Invalid notification data format.<br>";
                                var_dump($notification);
                            }
                        }
                    
                    ?>                    
                </div>
                <div class="w-full grow shrink basis-0 p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-start items-start gap-2.5 inline-flex">
                    <?php 
                        echo h4("Application");
                        echo divider(false);
                        
                        $query = "
                            SELECT 
                                aplications.id AS application_id,
                                aplications.from_user_id,
                                aplications.course_id,
                                courses.name AS course_name,
                                courses.banner_path AS course_banner_path,
                                aplications.school_id,
                                schools.name AS school_name,
                                schools.banner_path AS school_banner_path,
                                aplications.date,
                                aplications.approved
                            FROM 
                                aplications
                            LEFT JOIN 
                                courses ON aplications.course_id = courses.id
                            LEFT JOIN 
                                schools ON aplications.school_id = schools.id
                            WHERE 
                                aplications.from_user_id = ?
                        ";

                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$_SESSION['user_id']]);

                        $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (!is_array($applications)) {
                            echo "No applications found.";
                        }

                        foreach ($applications as $application) {
                            $title = isset($application['course_name']) ? $application['course_name'] : $application['school_name'];
                            $href = isset($application['course_name']) ? "../pages/details.php?course_=" . $application['course_id'] : "../pages/details.php?school=" . $application['school_id']; 
                            $image = isset($application['course_banner_path']) ? $application['course_banner_path'] : $application['school_banner_path'];

                            $date = $application['date'];

                            $status = ($application['approved'] == 1) ? "true" : (($application['approved'] === 0) ? "false" : "pending");

                            echo application($title , $date, $status, $image, "w-full", $href);
                        }
                    ?>   
                </div>
            </div>
            <div class="w-full self-stretch h-fit p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-center items-start gap-5 flex">
                <?php 
                    echo h4("History");
                    echo divider(false);
                
                ?>   
            </div>
            <div class="w-full self-stretch h-fit p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-center items-start gap-5 flex">
                <?php 
                    echo h4("Reviews");
                    echo divider(false);
                    
                    
                ?> 
            </div>
    <?php } else { ?>
        <div class="self-stretch h-fit rounded-md flex-col justify-start items-center gap-[90px] flex">
            <div class="self-stretch h-fit justify-start items-center gap-10 inline-flex">
                <img class="w-[179px] h-[179px] rounded-[96px] border-2 border-[var(--color-text)]" src="<?php echo $pfp ?>" />
                <div class="grow shrink basis-0 self-stretch flex-col justify-center items-start gap-2.5 inline-flex">
                    <div class="self-stretch justify-start items-center gap-2.5">
                        <?php echo h3(htmlspecialchars($result['first_name'] . " " . $result['last_name']), true) ?>
                        <div class="grow shrink basis-0 text-[var(--color-text50)] text-xl font-semibold font-['Lexend Deca'] leading-tight">Nisiculpa et dolor modi alias ipsa culpa qui ea ratione vitae.</div>
                    </div>
                </div>
            </div>
            <div class="self-stretch h-fit flex-col justify-center items-start gap-5 flex">
                <?php echo h4("History"); ?> 
                <div class="self-stretch justify-start items-start gap-5 inline-flex">
                    <?php 
                        
                    ?>
                </div>
            </div>
            <div class="self-stretch h-[329px] flex-col justify-center items-start gap-5 flex">
                <?php echo h4("Reviews"); ?> 
                <div class="self-stretch justify-start items-start gap-5 inline-flex">
                    <?php 

                    $query = "
                        SELECT
                            r.id AS review_id,
                            r.rating,
                            r.comment,
                            c.name AS course_name,
                            s.name AS school_name,
                            s.logo AS school_logo
                        FROM
                            ratings r
                            LEFT JOIN courses c ON r.course_id = c.id
                            LEFT JOIN schools s ON r.school_id = s.id
                        WHERE
                            r.from_user_id = ?
                    ";
                    
                    $stmt = $pdo->prepare($query);
                    $stmt->execute([$_GET['user']]);
                    
                    $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($ratings as $rating) {
                        $schoolName = htmlspecialchars($rating['school_name']);
                        $schoolLogo = htmlspecialchars($rating['school_logo']);
                        $reviewRating = htmlspecialchars($rating['rating']);
                        $reviewComment = htmlspecialchars($rating['comment']);
                    
                        echo reviewForSchool($schoolName, $reviewRating, $reviewComment, $schoolLogo, null, $rating['school_id']);
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

<div class="w-[82px] transform -translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-text)] outline-[2px] rounded-2xl left-[1%] flex-col justify-start items-center gap-[15px] inline-flex fixed top-1/2">
    <a href="../pages/profile.php?user=<?php echo $_SESSION['user_id'] ?>"><img class="self-stretch h-[52px] rounded-md border-2 border-[var(--color-text)]" src="<?php echo $_SESSION['pfp']; ?>" /></a>
    <a href="../pages/browse.php" class="self-stretch h-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-magnifying-glass"></i></a>
    <a href="../pages/account-settings.php" class="self-stretch h-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-gear"></i></a>
    <?php echo divider(false); ?>
    <a href="../scripts/user_logout.php" class="self-stretch h-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-door-open"></i></a>
</div>

</html>
