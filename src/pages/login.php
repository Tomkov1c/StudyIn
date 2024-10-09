<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <?php include "../components/MustInclude.php";
        session_start();
        if(isset($_SESSION['user_id'])) {
           header("Location: ../pages/browse.php"); 
        }
        ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 px-[125px] flex gap-[100px] h-[100vh]">
    <form method="post" action="../scripts/login_check.php" class="w-2/5 items-start gap-[15px] flex flex-col my-auto">
        <?php echo h2("Log In", true, false)?>
        <?php echo basicInputField("e-Mail", "email", "email", type: "email" , fullWidth: true, required: true) ?>
        <?php echo basicInputField("Password", "password", "password", type:"password" , fullWidth: true, required: true) ?>
        <?php echo submitButton("Log In", fullWidth: true) ?>
    </form>
    <img class="w-3/5 grow shrink basis-0 my-auto" src="../images/notebook.png" />
</body>
</html>