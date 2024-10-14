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
<body class="light bg-fixed bg-[var(--color-background)] w-screen m-0 p-[75px] flex flex-col gap-[100px]">
    <?php if($_SESSION['user_id'] == $_GET['user']){ ?>
            <div class="self-stretch h-[279px] rounded-md flex-col justify-start items-center gap-[90px] flex">
                <div class="self-stretch p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] justify-start items-center gap-10 inline-flex">
                    <img class="w-[179px] h-[179px] rounded-[96px] border-2 border-[var(--color-text)]" src="<?php echo $pfp ?>" />
                    <?php echo h3(htmlspecialchars($result['first_name'] . " " . $result['last_name']), true) ?>
                    <?php echo basicButton("Settings"); ?>
                    <?php echo iconButton("fa-solid fa-right-from-bracket", href: "../scripts/user_logout.php"); ?>
                    
                </div>
            </div>
            <div class="self-stretch justify-start items-start gap-[50px] inline-flex">
                <div class="grow shrink basis-0 p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-start items-start gap-2.5 inline-flex">
                    <?php 
                        echo h4("Notifications");
                        echo divider(false);
                    
                    ?>                    
                </div>
                <div class="grow shrink basis-0 p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-start items-start gap-2.5 inline-flex">
                    <?php 
                        echo h4("Application");
                        echo divider(false);
                    
                    ?>   
                </div>
            </div>
            <div class="self-stretch h-fit p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-center items-start gap-5 flex">
                <?php 
                    echo h4("History");
                    echo divider(false);
                
                ?>   
            </div>
            <div class="self-stretch h-fit p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-center items-start gap-5 flex">
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
                    <?php echo display("idk", "dhfjs" , year: "2020", image: "idk");
                            echo reviewFromUser(user: "idk", rating: "3.4", comment: "d", pfp: "../images/default_pfp.png");
                            echo reviewForSchool(school: "idk", rating: "3.4", comment: "d", schoolLogo: "../images/default_pfp.png", schoolId: "idk", additionalClasses: null); 
                            echo iconLink(text: "Somethibng", icon: "fa-solid fa-fire-extinguisher", href: "#"); ?>
                </div>ž
                <?php echo notification("idk", "idk");
                        echo filterButton("School", null, "School");
                        echo application("ERŠ", "2020", "false", "idk", null, "#") ?>
            </div>
            <div class="self-stretch h-[329px] flex-col justify-center items-start gap-5 flex">
                <?php echo h4("Reviews"); ?> 
                
            </div>
        </div>
    <?php } ?>
</body>
</html>
