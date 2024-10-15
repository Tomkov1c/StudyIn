<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <?php 
        include "../components/MustInclude.php"; 
        include_once '../scripts/database.php';
        session_start();
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE id=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user_id]);

        $user;

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
        }

        include "../scripts/get_pfp.php";


    ?>
</head>
<body class="light bg-[var(--color-background)] overflow-x-hidden w-screen 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] py-[75px] flex gap-[100px]">
    <div class=" flex-col w-full w-fill ml-auto mr-0 justify-start items-start gap-5 inline-flex">
        <?php echo h3("Settings") ?>
        <?php echo p("Adelit quo, vero neque, eos amet totam quae tempora ut quis sed ratione. Eosvel ipsa alias ipsa lorem tempora, natus minima iusto odit ipsum, rem laborum iusto quam ut. Animilibero aut nobis, dolore quae neque, odio tempora vel, ut sunt ut quae, iusto. Etfacilis velit laborum ut qui totam vero facilis alias sed quam nobis odit facilis at. ") ?>
        <?php echo divider() ?>
        <?php echo h4("Account Information") ?>
        <?php echo divider(true) ?>
        <?php echo h5("Profile Picture") ?>
        <div class="self-stretch h-[249px] justify-start items-center gap-[30px] inline-flex">
            <img class="w-[249px] h-[249px] rounded-[229px] border-2 border-[var(--color-text)]" src="<?php echo htmlspecialchars($profile_picture_path); ?>" />
            <div class="w-[245px] p-2.5 flex-col justify-center items-start gap-2.5 inline-flex">
                <form id="submitForum" action="../scripts/pfp_upload.php" method="post" enctype="multipart/form-data" class="w-full">
                    <input type="file" name="fileToUpload" class="hidden" id="fileToUpload" required>
                    <p id="fileName" class="hidden"></p>
                    <?php echo basicButton("Select File", id: "customButton", additionalClasses:"mb-4", fullWidth: true) ?>
                </form>
                <?php echo basicButton("Remove image", href: "../scripts/remove_pfp.php", fullWidth: true)?>
            </div>
        </div>
        <?php echo p("Dolorsunt autem quis tempore neque quam autem modi nobis qui id. Idculpa dolore, alias quas rem tempore vitae id rem ut! Ullammodi ad vel ad, natus elit dolor, in elit rem totam, in autem quis cumque. Adsed culpa ea, animi sint tempore nesciunt id eveniet odio lorem sit odit ipsum tempora. Ipsamid elit dolore natus facilis odio harum, odio sit. Minimaharum ea, alias illo lorem, at unde nesciunt odio tempore sint at culpa. ") ?>
        <?php echo divider() ?>

        <?php echo h5("Personal Information") ?>
        <form action="../scripts/user_update_info.php" method="post" class="gap-[30px] inline-flex flex-col w-full">
            <?php echo basicInputField("Name","name", "name", true, value: $user['first_name']) ?>
            <?php echo basicInputField("Surname","surname", "surname", true, value: $user['last_name']) ?>
            <?php echo submitButton("Change", fullWidth: true) ?>
        </form>
    </div>
</body>
<script src="../scripts/fileInput.js"></script>

<div class="w-[82px] transform -translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-text)] outline-[2px] rounded-2xl left-[1%] flex-col justify-start items-center gap-[15px] inline-flex fixed top-1/2">
    <a href="../pages/profile.php?user=<?php echo $_SESSION['user_id'] ?>"><img class="self-stretch h-[52px] rounded-md border-2 border-[var(--color-text)]" src="<?php echo $_SESSION['pfp']; ?>" /></a>
    <a href="../pages/browse.php" class="self-stretch h-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-magnifying-glass"></i></a>
    <?php echo divider(false); ?>
    <a href="../scripts/user_logout.php" class="self-stretch h-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-door-open"></i></a>
</div>

</html> 