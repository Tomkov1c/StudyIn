<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyIn</title>
    <?php include "components/MustInclude.php";?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 2xl:px-[125px] xl:px-[80px] lg:px-[50px] px-[25px] py-[75px] flex flex-col gap-[100px]">

    <!-- Hero -->
    <section class="w-full lg:items-start items-center inline-flex h-[80vh] gap-[10px]">
        <div class="w-full lg:w-1/2 z-10 self-stretch flex-col justify-center items-start inline-flex">
            <h1 class="w-full text-[var(--color-text)] text-[64px] font-extrabold font-sans pt-[12rem]">Welcome To Your Academic Future</h1>
            <h2 class="w-full h-[86px] text-[var(--color-text] text-xl font-semibold font-sans">Loremalias unde at ullam amet nobis sed animi id aut dolore.</h2>
            <div class="w-full px-0.5 justify-start items-end gap-[26px] inline-flex">
                <?php echo basicButton("Sign Up", href:"pages/signup.php")?>
                <?php echo basicButton("Log In", href:"pages/login.php")?>
            </div>
            <div class="mt-auto mb-0">
                <p class="text-center text-[var(--color-text)] text-[15px] font-normal font-sans"><i class="fa-solid fa-angles-down mr-2"></i>Scroll for more</p>
            </div>
        </div>
        <img class="lg:w-1/2 w-fill lg:my-auto lg:opacity-100 opacity-30 absolute lg:relative grow shrink basis-0 lg:block" src="images/notebook.png" />
    </section>

    <!-- Sub Hero -->
    <section class="w-full relative flex-col justify-center items-center gap-[26px] lg:inline-flex">
        <div class="self-stretch grow shrink basis-0 justify-start items-center gap-[26px] block lg:inline-flex">
            <div class="grow shrink py-[105px] bg-[var(--color-primary)] rounded-[25px] border-2 border-[var(--color-text)] mb-[26px] lg:mb-0">
                <h1 class="text-[var(--color-text)] 2xl:text-[64px] xl:text-[48px] lg:text-[44px] text-[64px] font-bold font-sans mt-auto h-fit mx-auto w-fit">Negative Users</h1>
                <h3 class="text-[var(--color-text)] text-[15px] font-normal font-sans mb-auto h-fit mx-auto w-fit">Send help</h3>
            </div>
            <div class="w-fill xl:w-[428px] lg:w-[279px] self-stretch py-[105px] bg-[var(--color-secondary)] rounded-[25px] border-2 border-[var(--color-text)] mb-[26px] lg:mb-0">
                <div class="text-[var(--color-text)] 2xl:text-[64px] xl:text-[48px] lg:text-[44px] text-[64px] font-bold font-sans mt-auto h-fit mx-auto w-fit">100% Free</div>
                <div class="text-[var(--color-text)] text-[15px] font-normal font-sans mb-auto h-fit mx-auto w-fit">Forever and ever</div>
            </div>
        </div>
        <div class="self-stretch grow shrink basis-0 justify-start items-center gap-[26px] block lg:inline-flex">
            <div class="grow shrink py-[105px] bg-[var(--color-text)] h-fit rounded-[25px] border-2 border-[var(--color-text)] mb-[26px] lg:mb-0">
                <h1 class="text-[var(--color-background)] text-center 2xl:text-[64px] xl:text-[48px] lg:text-[44px] text-[64px] font-bold font-sans mt-auto h-fit mx-auto w-fit">Available on GitHub</h1>
                <h3 class="text-[var(--color-background)] text-[15px] font-normal font-sans mb-auto h-fit mx-auto w-fit">With 1 star and counting</h3>
            </div>
            <div class="w-fill xl:w-[609px] lg:w-[388px] self-stretch py-[105px] bg-[var(--color-accent)] rounded-[25px] border-2 border-[var(--color-text)] mb-[26px] lg:mb-0">
                <div class="text-[var(--color-text)] 2xl:text-[64px] xl:text-[48px] lg:text-[44px] text-[64px] font-bold font-sans mt-auto h-fit mx-auto w-fit">419M €</div>
                <div class="text-[var(--color-text)] text-[15px] font-normal font-sans mb-auto h-fit mx-auto w-fit">In debt</div>
            </div>
        </div>
    </section>

    <?php echo myFooter() ?>

</body>
</html>