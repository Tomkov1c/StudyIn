<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <?php include "../components/MustInclude.php"; 
        include "../scripts/database.php";
        session_start();
        if(isset($_SESSION['user_id'])) {
           header("Location: ../pages/browse.php"); 
        }
        ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 2xl:px-[125px] xl:px-[75px] lg:px-[25px] px-[25px] flex gap-[100px] h-[100vh]">
    <form action="../scripts/user_insert.php" method="post" class="xl:w-2/5 lg:w-3/5 w-full items-start gap-[15px] flex flex-col my-auto z-10">
            <?php echo h2("Sign Up", true, false)?>
            <div class="flex flex-row gap-2.5 w-full">
                <?php echo basicInputField("Name", "name", "name", true, required: true) ?>
                <?php echo basicInputField("Surname", "surname", "surname", true, required: true) ?>
            </div>
            <?php echo basicInputField("e-Mail", "email", "email", true, required: true, type: "email") ?>
            <?php echo basicInputField("Password", "password", "password", true, required: true, type: "password") ?>
            <?php echo basicInputField("Confirm Password", "confpassword", "confpassword", true, required: true, type: "password") ?>
            <?php echo submitButton("Sign Up", fullWidth: true) ?>
    </form>
    <img class="2xl:w-3/5 lg:w-2/5 opacity-30 lg:opacity-100 lg:relative absolute grow shrink basis-0 my-auto z-0 object-contain h-full lg:object-fill lg:h-fit" src="../images/notebook.png" />
</body>

<div class="w-[82px] transform -translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-text)] outline-[2px] rounded-2xl left-[1%] flex-col justify-start items-center gap-[15px] inline-flex fixed top-1/2">
    <a href="../../index.php" class="self-stretch h-[52px] bg-[var(--color-secondary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-arrow-left"></i></a>
</div>
</html>