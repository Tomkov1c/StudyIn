<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        session_start();
        include_once "../components/MustInclude.php";
        include_once "../scripts/database.php";
        include_once "../scripts/get_pfp.php";

        if (isset($_SESSION['user_id'])) {
            $query = "SELECT r.name AS name FROM users u INNER JOIN roles r ON r.id = u.role_id WHERE u.id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_SESSION['user_id']]);
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                header("Location: ../pages/browse.php");
                die();
            }

            if(($result['name'] != "Owner" && $result['name'] != "Admin" && $result['name'] != "Mod") || $result['name'] == null) {
                header("Location: ../pages/browse.php");
            }
        }
    ?>
    <title>Create New Course</title>
</head>
<body class="light bg-fixed bg-[var(--color-background)] w-screen h-fit m-0 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] xl:py-[75px] py-[100px] flex flex-col gap-[20px]">
    <form action="../scripts/course_insert.php" method="post" class="h-fit gap-[20px] flex flex-col">
        <?php 
            echo h3("New Course");
            echo p("Add a new Course to a School in the database.");
            echo h4("Basic Information");
            echo divider(true);
            echo basicInputField("Name", "name", "name", true);
            //
                $querySchools = "SELECT id, name FROM schools";
                $stmtSchools = $pdo->prepare($querySchools);
                $stmtSchools->execute();
                $schools = $stmtSchools->fetchAll(PDO::FETCH_ASSOC);
                
                echo '<select name="school" id="school" class="' . selectBox() . '">';
                echo '<option value="">Select School</option>';
                foreach ($schools as $school) {
                    echo '<option value="' . $school['id'] . '">' . htmlspecialchars($school['name']) . '</option>';
                }
                echo '</select>';
            //
            echo divider(false);
            echo h5("Additional Information");
            echo basicInputField("Website", "website", "website", true);
            echo divider(false);
            // echo h4("Appearance");
            // echo divider(true);
        ?>
        <!-- <div class="flex flex-row gap-5">
            <div>
                <div class="h-fit min-w-[350px] p-2.5 flex-col justify-start items-start gap-2.5 inline-flex">
                    <div class="justify-start items-center gap-2.5 inline-flex">
                        <div class="text-[#0b0f13] text-xl font-semibold font-['Lexend Deca']">Logo</div>
                    </div>
                    <img class="w-[249px] mx-auto h-[249px] rounded-[229px] border-2 border-[#0b0f13]" src="https://via.placeholder.com/249x249" />
                    <div class="h-[130px] w-full p-2.5 flex-col justify-center items-start gap-5 flex">
                        <?php 
                            echo basicButton("Browse Images", null, true, "w-fill", id:"cusPfp");
                            echo basicButton("Remove Image", null, true, "w-fill", id:"cusPfpR");
                        ?>
                        <input type="file" id="pfp" value="" class="hidden">
                        <p id="pfpP" class="hidden"></p>
                    </div>
                </div>
            </div>
            <div class="h-fit w-full p-2.5 flex-col justify-start items-start gap-2.5 inline-flex">
                <div class="justify-start items-center gap-2.5 inline-flex">
                    <div class="text-[#0b0f13] text-xl font-semibold font-sans">Banner</div>
                </div>
                <img class="self-stretch w-fill h-[249px] rounded-[25px] border-2 border-[#0b0f13]" src="https://via.placeholder.com/1291x249" />
                <div class="self-stretch h-fill p-2.5 flex-col justify-center items-center gap-5 flex">
                    <?php 
                        echo basicButton("Browse Images", id:"cusBanner");
                        echo basicButton("Remove Image", id:"cusBannerR");
                    ?>
                    <input type="file" id="banner" value="" class="hidden">
                    <p id="bannerP" class="hidden"></p>
                </div>
            </div>
        </div> -->
        <?php 
            echo divider(false);
            echo divider(true);
            echo submitButton("Create")
        ?>
    </form>
</body>
<?php echo adminHeader() ?>
<!-- <script>
document.getElementById('cusPfp').addEventListener('click', function() {
    document.getElementById('pfp').click();
});
document.getElementById('cusBanner').addEventListener('click', function() {
    document.getElementById('banner').click();
});

document.getElementById('cusPfp').addEventListener('change', function() {
    if (document.getElementById('cusPfp').files.length > 0) {
        document.getElementById('pfpP').textContent = document.getElementById('cusPfp').files[0].name;
    } else {
        document.getElementById('pfpP').textContent = 'No file chosen';
    }
});
document.getElementById('cusBanner').addEventListener('change', function() {
    if (document.getElementById('cusBanner').files.length > 0) {
        document.getElementById('bannerP').textContent = document.getElementById('cusBanner').files[0].name;
    } else {
        document.getElementById('bannerP').textContent = 'No file chosen';
    }
});
const observer = new MutationObserver(function(mutationsList, observer) {
    for (const mutation of mutationsList) {
        if (mutation.type === 'childList') {
        }
    }
});

observer.observe(fileName, {
    childList: true,
    subtree: true,
});

</script> -->
</html>
