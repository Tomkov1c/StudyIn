<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/MustInclude.php"; 
        include "../scripts/database.php";
        
        if (isset($_GET['school'])) {
            $query = "SELECT
                        schools.id AS school_id,
                        schools.name AS school_name,
                        schools.adress AS school_address,
                        schools.website AS school_website,
                        schools.email AS school_email,
                        schools.phone_number AS school_phone_number,
                        schools.logo_path AS school_logo_path,
                        schools.banner_path AS school_banner_path,
                        schools.details_page_content AS school_details_page_content,
                        cities.name AS city_name,
                        cities.post_code AS city_post_code,
                        regions.name AS region_name,
                        countries.name AS country_name,
                        users.first_name AS principal_first_name,
                        users.last_name AS principal_last_name,
                        types.name AS school_type,
                        AVG(ratings.rating) AS average_rating
                    FROM
                        schools
                        JOIN cities ON schools.city_id = cities.id
                        JOIN regions ON cities.region_id = regions.id
                        JOIN countries ON regions.country_id = countries.id
                        LEFT JOIN users ON schools.principal_user_id = users.id
                        JOIN types ON schools.type_id = types.id
                        LEFT JOIN ratings ON schools.id = ratings.school_id
                    WHERE
                        schools.id = ?
                    GROUP BY
                        schools.id, schools.name, schools.adress, schools.website,
                        schools.email, schools.phone_number, schools.logo_path,
                        schools.banner_path, schools.details_page_content,
                        cities.name, cities.post_code, regions.name, countries.name,
                        users.first_name, users.last_name, types.name; ";
            $stmt = $pdo->prepare($query);
            $stmt->execute([(int)$_GET['school']]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "Doesn't exist";
                die();
            }
            
            $Id = $result['school_id'];
            $Name = $result['school_name'];
            $Address = $result['school_address'];
            $Website = $result['school_website'];
            $Email = $result['school_email'];
            $PhoneNumber = $result['school_phone_number'];
            $LogoPath = $result['school_logo_path'];
            $BannerPath = $result['school_banner_path'];
            $DetailsPageContent = $result['school_details_page_content'];
            $cityName = $result['city_name'];
            $cityPostCode = $result['city_post_code'];
            $regionName = $result['region_name'];
            $countryName = $result['country_name'];
            $principalFirstName = $result['principal_first_name'];
            $principalLastName = $result['principal_last_name'];
            $Type = $result['school_type'];
            $averageRating = $result['average_rating'];


        } else if (isset($_GET['course'])) {
            $query = "SELECT 
                    c.id AS course_id,
                    c.name AS course_name,
                    c.school_id AS course_school_id,
                    c.website AS course_website,
                    c.logo_path AS course_logo_path,
                    c.banner_path AS course_banner_path,
                    c.details_page_content AS course_details,
                    
                    s.id AS school_id,
                    s.name AS school_name,
                    s.adress AS school_address,
                    s.city_id AS school_city_id,
                    s.website AS school_website,
                    s.email AS school_email,
                    s.phone_number AS school_phone_number,
                    s.principal_user_id AS school_principal_user_id,
                    s.logo_path AS school_logo_path,
                    s.banner_path AS school_banner_path,
                    s.details_page_content AS school_details,
                    s.type_id AS school_type_id

                FROM 
                    courses AS c
                JOIN 
                    schools AS s ON c.school_id = s.id
                WHERE 
                    c.id = ?;
                ";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$_GET['course']]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "Doesn't exist";
                die();
            }

            $Id = $result['course_id'];
            $courseId = $result['course_id'];
            $Name = $result['course_name'];
            $SchoolId = $result['course_school_id'];
            $Website = $result['course_website'];
            $LogoPath = $result['course_logo_path'] ?? $result['school_logo_path'];
            $BannerPath = $result['course_banner_path'] ?? $result['school_banner_path'];
            $Details = $result['course_details'];

            $schoolId = $result['school_id'];
            $schoolName = $result['school_name'];
            $schoolAddress = $result['school_address'];
            $schoolCityId = $result['school_city_id'];
            $schoolWebsite = $result['school_website'];
            $schoolEmail = $result['school_email'];
            $schoolPhoneNumber = $result['school_phone_number'];
            $schoolPrincipalUserId = $result['school_principal_user_id'];
            $schoolTypeId = $result['school_type_id'];

            $query = "SELECT
                        schools.id AS school_id,
                        schools.name AS school_name,
                        schools.adress AS school_address,
                        schools.website AS school_website,
                        schools.email AS school_email,
                        schools.phone_number AS school_phone_number,
                        schools.logo_path AS school_logo_path,
                        schools.banner_path AS school_banner_path,
                        schools.details_page_content AS school_details_page_content,
                        cities.name AS city_name,
                        cities.post_code AS city_post_code,
                        regions.name AS region_name,
                        countries.name AS country_name,
                        users.first_name AS principal_first_name,
                        users.last_name AS principal_last_name,
                        types.name AS school_type,
                        AVG(ratings.rating) AS average_rating
                    FROM
                        schools
                        JOIN cities ON schools.city_id = cities.id
                        JOIN regions ON cities.region_id = regions.id
                        JOIN countries ON regions.country_id = countries.id
                        LEFT JOIN users ON schools.principal_user_id = users.id
                        JOIN types ON schools.type_id = types.id
                        LEFT JOIN ratings ON schools.id = ratings.school_id
                    WHERE
                        schools.id = ?
                    GROUP BY
                        schools.id, schools.name, schools.adress, schools.website,
                        schools.email, schools.phone_number, schools.logo_path,
                        schools.banner_path, schools.details_page_content,
                        cities.name, cities.post_code, regions.name, countries.name,
                        users.first_name, users.last_name, types.name; ";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$schoolId]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "Doesn't exist";
                die();
            }
            
            $Email = null;
            $PhoneNumber = null;
            $cityName = $result['city_name'];
            $cityPostCode = $result['city_post_code'];
            $regionName = $result['region_name'];
            $countryName = $result['country_name'];
            $principalFirstName = $result['principal_first_name'];
            $principalLastName = $result['principal_last_name'];
            $Type = $schoolName;
            $averageRating = $result['average_rating'];

            
        } else {
            
        }

        echo "<title>" . $Name . "</title>";
    ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 flex flex-col gap-[25px] 2xl:px-[125px] xl:px-[80px] lg:px-[50px] px-[25px] py-[75px]">
    <div class="self-stretch h-fit flex-col justify-start items-center gap-2.5 flex">
        <img class="w-full rounded-xl<?php if($BannerPath) ?> object-cover h-[70vh]" src="<?php echo $BannerPath;?>" />
        <div class="self-stretch h-fit w-full flex-col gap-[25px] flex xl:px-[150px] lg:px-[100px] px-[0px]">
            <div class="flex-col gap-2.5 flex w-full">
                <?php 
                
                echo h4($Name);
                echo divider( true);
                echo h6($Type);
                
                ?>
            </div>
            <div class="self-stretch justify-start items-start gap-[25px] xl:inline-flex">
                <div class="grow shrink basis-0 self-stretch py-2.5 flex-col justify-start items-start gap-2.5 inline-flex">
                    <?php echo h4("About"); 
                    
                    
                    echo divider(false);
                    echo h4("Ratings"); 

                    if(isset($_GET['course'])) {
                        $query = "SELECT * FROM ratings WHERE course_id = ?";
                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$_GET['course']]);
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        if (empty($results)) {
                            die();
                        }
                        foreach ($results as $course) {
                            echo reviewFromUser($result['user_id'], );
                        }
                    }
                    echo divider(false);
                    ?>
                </div>
                <div class="xl:min-w-[250px] xl:w-fit xl:max-w-[350px] w-full p-[30px] bg-[#dbe3e9] rounded-[25px] border-2 border-[#0b0f13] flex-col justify-start items-start gap-2.5 inline-flex">
                    <?php 
                        if ($LogoPath != null) {
                            echo '<img class="w-[140px] mx-auto h-[140px] rounded-[25px] border-2 border-[#0b0f13]" src="' . $LogoPath . '" />';
                            echo divider(false);
                        } 

                        echo h5("Info");

                        if ($Website != null) {
                            echo iconLink("Website", "fa-solid fa-globe", null, $schoolWebsite);
                        }                        
                        if ($cityName != null) {
                            echo iconLink($cityName, "fa-solid fa-location-dot", null);
                        }
                        if ($countryName != null) {
                            echo iconLink($countryName, "fa-solid fa-flag", null);
                        }
                        if ($Email != null) {
                            echo iconLink($schoolEmail, "fa-solid fa-envelope", null);
                        }
                        if ($PhoneNumber != null) {
                            echo iconLink($schoolPhoneNumber, "fa-solid fa-phone", null);
                        }
                        if ($principalFirstName != null || $principalLastName != null) {
                            $principalName = trim($principalFirstName . ' ' . $principalLastName);
                            echo iconLink($principalName, "fa-solid fa-user", null);
                        }
                        if ($averageRating != null) {
                            echo iconLink($averageRating, "fa-solid fa-star", null);
                        }
                        
                        echo divider(false);

                        if(isset($_GET['school']))
                        {
                            $query = "SELECT * FROM courses WHERE school_id = ?";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute([$_GET['school']]);

                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (empty($results)) {
                                die();
                            }

                            foreach ($results as $course) {
                                echo iconLink($course['name'], "fa-solid fa-book", null, "../pages/details.php?course=" . $course['id']);
                            }

                        }else {
                            echo iconLink($schoolName, "fa-solid fa-school", "w-full truncate", "../pages/details.php?school=" . $schoolId);
                        }

                        echo divider(false);
                    
                    ?>
                    <form method="post" action="../scripts/course_application_send.php" class="block w-full">
                        <input type="hidden" id="course" name="course" value="<?php $_GET['school']; ?>" >
                        <?php echo submitButton("Apply", false, "w-full"); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 