<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <?php include "../components/MustInclude.php"; 
        include "../scripts/database.php";?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 px-[75px] flex gap-[100px] h-[100vh]">
    <form action="../scripts/user_insert.php" method="post" class="w-2/5 items-start gap-[15px] flex flex-col my-auto">
        <?php echo h2("Sign Up", true, false)?>
            <div class="flex flex-row gap-2.5">
                <?php echo basicInputField("Name", "name", "name", true) ?>
                <?php echo basicInputField("Surname", "surname", "surname", true) ?>
            </div>
            <?php echo basicInputField("e-Mail", "email", "email", true, required: true, type: "email") ?>
            <?php echo basicInputField("Password", "password", "password", true, required: true, type: "password") ?>
            <?php echo basicInputField("Confirm Password", "confpassword", "confpassword", true, required: true, type: "password") ?>
            <?php echo submitButton("Sign Up", fullWidth: true) ?>
    </form>
    <img class="w-3/5 grow shrink basis-0 my-auto" src="../images/notebook.png" />
</body>
</html>