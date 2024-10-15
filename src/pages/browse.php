<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <?php include "../components/MustInclude.php";
    ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 flex flex-col gap-[25px] 2xl:px-[125px] xl:px-[80px] lg:px-[50px] px-[25px] py-[75px]">
    <?php echo h3("Search")?>
    <div class="flex gap-5">
        <?php echo filterButton("Courses", null, null);
                echo filterButton("School", null, null)?>
    </div>
    <?php echo basicInputField("Search", null, null, null); ?>
    
</body>
</html> 