<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyIn</title>
    <?php include "Components/MustInclude.php"; ?>
</head>
<body class="light bg-[var(--color-background)] h-200 w-screen m-0 p-[75px]">
    <section class="w-full justify-center items-center inline-flex h-[80%]">
        <div class="w-1/2 self-stretch flex-col justify-center items-start inline-flex">
            <h1 class="w-full text-[var(--color-text)] text-[64px] font-extrabold font-sans">Welcome To Your Academic Future</h1>
            <h2 class="w-full h-[86px] text-[var(--color-text] text-xl font-semibold font-['Lexend Deca']">Loremalias unde at ullam amet nobis sed animi id aut dolore.</h2>
            <div class="w-full px-0.5 justify-start items-end gap-[26px] inline-flex">
                <?php echo basicButton("Sign Up")?>
                <?php echo basicButton("Log In")?>
            </div>
            <div class="left-0 top-[891.50px] justify-start items-start gap-[17px] inline-flex">
                <p class="text-center text-[#0b0f13] text-[15px] font-normal font-sans"><i class="fa-solid fa-computer-mouse mr-2"></i>Scroll for more</p>
            </div>
        </div>
        <img class="w-1/2 grow shrink basis-0" src="images/notebook.png" />
    </section>

</body>
</html>