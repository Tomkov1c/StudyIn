<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyIn</title>
    <?php include "Components/MustInclude.php"; ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 p-[75px] flex flex-col gap-[100px]">
    <section class="w-full justify-center items-center inline-flex h-[80vh]">
        <div class="w-1/2 self-stretch flex-col justify-center items-start inline-flex">
            <h1 class="w-full text-[var(--color-text)] text-[64px] font-extrabold font-sans pt-[12rem]">Welcome To Your Academic Future</h1>
            <h2 class="w-full h-[86px] text-[var(--color-text] text-xl font-semibold font-sans">Loremalias unde at ullam amet nobis sed animi id aut dolore.</h2>
            <div class="w-full px-0.5 justify-start items-end gap-[26px] inline-flex">
                <?php echo basicButton("Sign Up")?>
                <?php echo basicButton("Log In")?>
            </div>
            <div class="left-0 mt-auto mb-0 justify-start items-start gap-[17px] inline-flex">
                <p class="text-center text-[#0b0f13] text-[15px] font-normal font-sans"><i class="fa-solid fa-angles-down mr-2"></i>Scroll for more</p>
            </div>
        </div>
        <img class="w-1/2 my-auto grow shrink basis-0" src="images/notebook.png" />
    </section>
    <section class="w-full relative flex-col justify-center items-center gap-[26px] inline-flex">
        <div class="self-stretch grow shrink basis-0 justify-start items-center gap-[26px] inline-flex">
            <div class="grow shrink basis-0 self-stretch py-[145px] bg-[var(--color-primary)] rounded-[25px] border-2 border-[#0b0f13] flex-col justify-center items-center gap-2.5 inline-flex">
                <div class="text-[var(--color-text)] text-[64px] font-bold font-sans">Negative Users</div>
                <div class="text-[var(--color-text)] text-[15px] font-normal font-sans">Send help</div>
            </div>
            <div class="w-[328px] self-stretch py-[145px] bg-[var(--color-secondary)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 inline-flex">
                <div class="text-[var(--color-text)] text-[50px] font-bold font-sans">100% Free</div>
                <div class="text-[var(--color-text)] text-[15px] font-normal font-sans">Forever and ever</div>
            </div>
        </div>
        <div class="self-stretch grow shrink basis-0 justify-start items-center gap-[26px] inline-flex">
            <div class="grow shrink basis-0 self-stretch py-[145px] bg-[var(--color-text)] rounded-[25px] border-2 border-[var(--color-text)] justify-center items-center gap-[26px] flex">
                <div class="h-[181px] flex-col justify-center items-center gap-2.5 inline-flex">
                    <div class="text-[var(--color-background)] text-[64px] font-bold font-sans">Available on GitHub</div>
                    <div class="self-stretch text-center text-[var(--color-background)] text-[15px] font-normal font-sans">With 1 stars and counting</div>
                </div>
            </div>
            <div class="w-[509px] self-stretch py-[145px] bg-[var(--color-accent)] rounded-[25px] border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 inline-flex">
                <div class="text-[var(--color-text)] text-[50px] font-bold font-sans">419M €</div>
                <div class="text-[var(--color-text)] text-[15px] font-normal font-sans">in debt</div>
            </div>
        </div>
    </section>

</body>
</html>