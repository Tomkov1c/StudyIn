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
        <?php echo p("Customize your account.") ?>
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
        <?php echo p("Profile picture makes you easily recognizable.") ?>
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

<?php echo userHeader(true, true, true, false, "../pages/browse.php", true, true, true) ?>

</html> 