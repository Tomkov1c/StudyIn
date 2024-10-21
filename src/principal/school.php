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

        if (!isset($_SESSION['principal'])) {
            header("Location ../pages/login.php");
        }

        $queryCheckPrincipal = "SELECT * FROM schools WHERE principal_user_id = ?";
        $stmtCheckPrincipal = $pdo->prepare($queryCheckPrincipal);
        $stmtCheckPrincipal->execute([$_SESSION['user_id']]);
        $school = $stmtCheckPrincipal->fetch(PDO::FETCH_ASSOC);
    
    ?>
    <title>Edit School</title>
</head>
<body class="light bg-fixed bg-[var(--color-background)] w-screen h-fit m-0 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] xl:py-[75px] py-[100px] flex flex-col gap-[20px]">
    <form action="../scripts/school_update.php" method="post" class="h-fit gap-[20px] flex flex-col">
        <?php 
            echo h3("Edit School");
            echo p("Edit School's properties.");
            echo h4("Basic Information");
            echo divider(true);
            echo basicInputField("Name", "name", "name", true,  value: $school['name'], );
            //
                $currentTypeId = $school['type_id'];

                $query = "SELECT id, name FROM types";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                
                $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo '<select name="type" id="type" class="h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-background)] px-[15px] py-[10px] outline outline-[var(--color-text)] outline-2 rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block mx-0.5 placeholder-gray-500 font-sans text-xl font-medium">';
                
                foreach ($types as $type) {
                    $selected = ($type['id'] == $currentTypeId) ? 'selected' : '';
                    echo '<option class="' . selectBox() . '" value="' . $type['id'] . '" ' . $selected . '>' . htmlspecialchars($type['name']) . '</option>';
                }
                
                echo '</select>';
            //
            echo divider(false);
            echo h5("Location");
            //
                $currentCityId = $school['city_id'];
                $queryCountries = "SELECT id, name FROM countries";
                $stmtCountries = $pdo->prepare($queryCountries);
                $stmtCountries->execute();
                $countries = $stmtCountries->fetchAll(PDO::FETCH_ASSOC);
                
                $queryCities = "SELECT id, name FROM cities";
                $stmtCities = $pdo->prepare($queryCities);
                $stmtCities->execute();
                $cities = $stmtCities->fetchAll(PDO::FETCH_ASSOC);
                
                echo '<select name="city" id="city" class="h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-background)] px-[15px] py-[10px] outline outline-[var(--color-text)] outline-2 rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block mx-0.5 placeholder-gray-500 font-sans text-xl font-medium">';
                
                foreach ($cities as $city) {
                    $selected = ($city['id'] == $currentCityId) ? 'selected' : '';
                    echo '<option value="' . $city['id'] . '" ' . $selected . '>' . htmlspecialchars($city['name']) . '</option>';
                }
                
                echo '</select>';
            
            //
            echo basicInputField("Address", "address", "address", true, value: $school['adress']);
            echo divider(false);
            echo h5("Additional Information");
            echo basicInputField("Email", "email", "email", true, value: $school['email']);
            echo basicInputField("Phone Number", "phone", "phone", true, value: $school['phone_number']);
            echo basicInputField("Website", "website", "website", true, value: $school['website']);
            echo divider(false);
            echo h4("Appearance");
            echo divider(true);
        ?>
        <div class="flex flex-row gap-5">
            <div>
                <div class="h-fit min-w-[350px] p-2.5 flex-col justify-start items-start gap-2.5 inline-flex">
                    <div class="justify-start items-center gap-2.5 inline-flex">
                        <div class="text-[#0b0f13] text-xl font-semibold font-['Lexend Deca']">Logo</div>
                    </div>
                    <img class="w-[249px] mx-auto h-[249px] rounded-[229px] border-2 border-[#0b0f13] object-cover" src="<?php echo $school['logo_path'] ?>" />
                    <div class="h-[130px] w-full p-2.5 flex-col justify-center items-start gap-5 flex">
                        <?php echo basicInputField("Link", "logo_path", "logo_path", true, value: $school['logo_path']) ?>
                    </div>
                </div>
            </div>
            <div class="h-fit w-full p-2.5 flex-col justify-start items-start gap-2.5 inline-flex">
                <div class="justify-start items-center gap-2.5 inline-flex">
                    <div class="text-[#0b0f13] text-xl font-semibold font-sans">Banner</div>
                </div>
                <img class="self-stretch w-fill h-[249px] rounded-[25px] border-2 border-[#0b0f13] object-cover" src="<?php echo $school['banner_path'] ?>" />
                <div class="self-stretch h-fill p-2.5 flex-col justify-center items-center gap-5 flex">
                    <?php echo basicInputField("Banner", "banner_path", "banner_path", true, value: $school['banner_path']) ?>
                </div>
            </div>
        </div>
        <?php 
            echo divider(false);
            echo divider(true);
            echo submitButton("submit")
        ?>
    </form>
</body>
<?php echo principalHeader() ?>
</html>
