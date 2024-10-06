<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <?php include "../components/MustInclude.php"; ?>
</head>
<body class="light bg-[var(--color-background)] overflow-x-hidden w-screen m-0 p-[75px] flex gap-[100px]">
    <div class="h-fit fixed w-[15%] p-[25px] bg-[var(--color-terciary)] rounded-md border-2 border-[#0b0f13] flex-col justify-start items-start gap-2.5 inline-flex">
        <?php echo h5("Table of Contents")?>
        <?php echo basicButton("Lorem", fullWidth: true, additionalClasses: "my-1") ?>
        <?php echo basicButton("Lorem", fullWidth: true, additionalClasses: "my-1") ?>
        <?php echo basicButton("Lorem", fullWidth: true, additionalClasses: "my-1") ?>
        <?php echo basicButton("Lorem", fullWidth: true, additionalClasses: "my-1") ?>
    </div>
    <div class=" flex-col w-[80%] ml-auto mr-0 justify-start items-start gap-5 inline-flex">
        <?php echo h3("Settings") ?>
        <?php echo p("Adelit quo, vero neque, eos amet totam quae tempora ut quis sed ratione. Eosvel ipsa alias ipsa lorem tempora, natus minima iusto odit ipsum, rem laborum iusto quam ut. Animilibero aut nobis, dolore quae neque, odio tempora vel, ut sunt ut quae, iusto. Etfacilis velit laborum ut qui totam vero facilis alias sed quam nobis odit facilis at. ") ?>
        <?php echo divider() ?>
        <?php echo h4("Account Information") ?>
        <?php echo divider(true) ?>
        <?php echo h5("Profile Picture") ?>
        <div class="self-stretch h-[249px] justify-start items-center gap-[30px] inline-flex">
            <img class="w-[249px] h-[249px] rounded-[229px] border-2 border-[#0b0f13]" src="https://via.placeholder.com/249x249" />
            <div class="w-[245px] p-2.5 flex-col justify-center items-start gap-2.5 inline-flex">
                <?php echo basicButton("Browse images", additionalClasses: "mb-2") ?>
                <?php echo basicButton("Remove image",) ?>
            </div>
        </div>
        <?php echo p("Dolorsunt autem quis tempore neque quam autem modi nobis qui id. Idculpa dolore, alias quas rem tempore vitae id rem ut! Ullammodi ad vel ad, natus elit dolor, in elit rem totam, in autem quis cumque. Adsed culpa ea, animi sint tempore nesciunt id eveniet odio lorem sit odit ipsum tempora. Ipsamid elit dolore natus facilis odio harum, odio sit. Minimaharum ea, alias illo lorem, at unde nesciunt odio tempore sint at culpa. ") ?>
        <?php echo divider() ?>

        <?php echo h5("Personal Information") ?>
        <?php echo basicInputField("Name","name", "name", true) ?>
        <?php echo basicInputField("Surname","surname", "surname", true) ?>
        <?php echo basicInputField("School Email","semail", "semail", true) ?>
        <?php echo basicButton("Change", fullWidth: true) ?>
        <?php echo divider() ?>

        <?php echo h5("Change Email") ?>
        <?php echo basicInputField("New Email","email", "email", true) ?>
        <?php echo basicInputField("Password","epassword", "epassword", true) ?>
        <?php echo basicButton("Change", fullWidth: true) ?>
        <?php echo divider() ?>

        <?php echo h5("Change Password") ?>
        <?php echo basicInputField("New Password","newpassword", "newpassword", true) ?>
        <?php echo basicInputField("Old Password","Password", "Password", true) ?>
        <?php echo basicButton("Change", fullWidth: true) ?>
        <?php echo divider() ?>
        <?php echo divider() ?>

        <?php echo h4("Miscellaneous") ?>
        <?php echo divider(true) ?>
        <?php echo divider() ?>
        <?php echo h5("Delete Account") ?>
        <?php echo basicInputField("Password","Password", "Password", true) ?>
        <?php echo basicButton("Delete Account", fullWidth: true, additionalClasses: "bg-[var(--color-bad)]") ?>
    </div>
</body>
</html> 