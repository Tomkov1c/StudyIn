<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include "../components/MustInclude.php"; ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 p-[75px] flex flex-col gap-[100px]">
    <section class="w-full h-full p-[50px] bg-[var(--color-terciary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-start items-center gap-[90px] inline-flex">
        <div class="self-stretch h-[188px] justify-start items-center gap-10 inline-flex">
            <img class="w-[179px] h-[179px] rounded-[96px] border-2 border-[var(--color-text)]" src="https://via.placeholder.com/179x179" />
            <div class="grow shrink basis-0 self-stretch flex-col justify-center items-start gap-1 inline-flex">
                <?php echo h3("Jure Primer") ?>
                <div class="gap-2.5 inline-flex h-fit">
                    <i class="fa-solid fa-school my-auto mx-auto"></i>
                    <?php echo h5("Nisiculpa et dolor modi alias ipsa culpa qui ea ratione vitae.", additionalClasses: "my-auto") ?>
                </div>
            </div>
        </div>
        <div class="self-stretch h-[414px] flex-col justify-center items-start gap-5 flex overflow-hidden">
            <?php echo h4("Achivements") ?>
            <div class="self-stretch justify-start items-start gap-[30px] inline-flex">
                <?php echo display("idk", "iosdfkjifgds", "2024", "https://via.placeholder.com/1920x1080") ?>
                <?php echo display("idk", "iosdfkjifgds", "2024", "https://via.placeholder.com/1920x1080") ?>
                <?php echo display("idk", "iosdfkjifgds", "2024", "https://via.placeholder.com/1920x1080") ?>
            </div>
        </div>
    </section>

</body>
</html>