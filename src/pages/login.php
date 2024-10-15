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
<body class="light bg-[var(--color-background)] w-screen m-0 2xl:px-[125px] xl:px-[75px] lg:px-[25px] px-[25px] flex gap-[100px] h-[100vh]">
    <form method="post" action="../scripts/login_check.php" class="lg:w-2/5 w-full items-start gap-[15px] flex flex-col my-auto z-10">
        <?php echo h2("Log In", true, false)?>
        <?php echo basicInputField("e-Mail", "email", "email", type: "email" , fullWidth: true, required: true) ?>
        <?php echo basicInputField("Password", "password", "password", type:"password" , fullWidth: true, required: true) ?>
        <?php echo submitButton("Log In", fullWidth: true) ?>
    </form>
    <img class="xl:w-3/5 lg:w-2/5 w-fill grow shrink basis-0 lg:relative absolute block z-0 lg:opacity-100 opacity-30 my-auto object-contain h-full lg:object-fill lg:h-fit" src="../images/notebook.png" />
</body>

<div class="w-[82px] transform -translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-text)] outline-[2px] rounded-2xl left-[1%] flex-col justify-start items-center gap-[15px] inline-flex fixed top-1/2">
    <a href="../../index.php" class="self-stretch h-[52px] bg-[var(--color-secondary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-arrow-left"></i></a>
</div>
</html>