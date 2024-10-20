<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../components/MustInclude.php"; 
        include "../scripts/database.php";
        session_start();
        
        $Id = null;
        $courseId = null;
        $Name = null;
        $SchoolId = null;
        $Website = null;
        $LogoPath = null;
        $BannerPath = null;
        $Details = null;
        $AverageRating = null;

        if (isset($_GET['course'])) {
            $query = "SELECT 
                    c.id AS course_id,
                    c.name AS course_name,
                    c.school_id AS course_school_id,
                    c.website AS course_website,
                    c.logo_path AS course_logo_path,
                    c.banner_path AS course_banner_path,
                    c.details_page_content AS course_details,
                    
                    s.id AS school_id,
                    AVG(r.rating) AS average_rating

                FROM 
                    courses AS c
                JOIN 
                    schools AS s ON c.school_id = s.id
                LEFT JOIN 
                    ratings AS r ON c.id = r.course_id
                WHERE 
                    c.id = ?
                GROUP BY 
                    c.id, c.name, c.school_id, c.website, c.logo_path, 
                    c.banner_path, c.details_page_content, s.id;
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
            $LogoPath = $result['course_logo_path'];
            $BannerPath = $result['course_banner_path'];
            $Details = $result['course_details'];
            $AverageRating = $result['average_rating'];
            
        }

        if (isset($_GET['school']) || ($Id != null && $Id != "" && $Id != " ") ) {
            $SchoolId = isset($_GET['school']) ? $_GET['school'] : $SchoolId;
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
            $stmt->execute([$SchoolId]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == null) {
                echo "Doesn't exist";
                die();
            }
            
            $schoolName = $result['school_name'];
            $schoolAddress = $result['school_address'];
            $schoolWebsite = $result['school_website'];
            $schoolEmail = $result['school_email'];
            $schoolPhoneNumber = $result['school_phone_number'];
            $schoolLogoPath = $result['school_logo_path'];
            $schoolBannerPath = $result['school_banner_path'];
            $schoolDetailsPageContent = $result['school_details_page_content'];
            $cityName = $result['city_name'];
            $cityPostCode = $result['city_post_code'];
            $regionName = $result['region_name'];
            $countryName = $result['country_name'];
            $principalFirstName = $result['principal_first_name'];
            $principalLastName = $result['principal_last_name'];
            $schoolType = $result['school_type'];
            $schoolAverageRating = $result['average_rating'];

            
        }
    ?>
    <?php 
    
    $title = isset($Name) ? $Name : $schoolName;
    echo "<title>" . $title . "</title>";
    
    ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 flex flex-col gap-[25px] 2xl:px-[125px] xl:px-[80px] lg:px-[50px] px-[25px] xl:py-[75px] py-[25px]">
    <div class="self-stretch h-fit flex-col justify-start items-center gap-2.5 flex">
        <img class="w-full rounded-xl object-cover h-[70vh]" src="<?php echo isset($BannerPath) ? $BannerPath : $schoolBannerPath ; ?>" />
        <div class="self-stretch h-fit w-full flex-col gap-[25px] flex xl:px-[150px] lg:px-[50px] px-[0px]">
            <div class="flex-col gap-2.5 flex w-full">
                <?php 
                echo h4(isset($Name) ? $Name : $schoolName);
                echo divider( true);
                ?>
            </div>
            <div class="self-stretch justify-start items-start gap-[25px] lg:inline-flex">
                <div class="grow shrink basis-0 self-stretch w-full py-2.5 flex-col justify-start items-start gap-2.5 inline-flex">
                    <?php 
                                       
                    if (isset($schoolDetailsPageContent) || isset($Details)) {
                        echo h4("About");
                        echo isset($Details) ? $Details : $schoolDetailsPageContent;
                    }
                                    
                    
                    echo divider(false);

                    if(isset($_GET['course'])) {
                        $query = "SELECT r.id AS rating_id,
                                        r.from_user_id AS rating_user_id,
                                        r.rating AS rating_rating,
                                        r.comment AS rating_comment,
                                        r.course_id AS rating_course,
                                        r.school_id AS rating_school,
                                        u.id AS user_id,
                                        u.first_name AS user_name,
                                        u.last_name AS user_surname,
                                        u.profile_picture_path AS user_pfp
                                FROM ratings r
                                INNER JOIN users u ON u.id = r.from_user_id
                                WHERE course_id = ?";

                        $stmt = $pdo->prepare($query);
                        $stmt->execute([$_GET['course']]);
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (empty($results)) {
                            
                        }
//                         echo h4("Ratings");
// 
//                         foreach ($results as $course) {
//                             echo reviewFromUser(
//                                 $course['user_name'] . " " . $course['user_surname'],
//                                 $course['rating_rating'],                            
//                                 $course['rating_comment'],                            
//                                 isset($course['user_pfp']) ? $course['user_pfp'] : "../images/default_pfp.png"  ,
//                                 additionalClasses:"w-full"                 
//                             );
//                         }

                    }
                    echo divider(false);
                    ?>
                </div>
                <div class="md:min-w-[250px] md:w-fit md:max-w-[350px] mt-[25px] md:mt-[0px] w-full p-[30px] bg-[#dbe3e9] rounded-[25px] border-2 border-[#0b0f13] flex-col justify-start items-start gap-2.5 flex">
                    <?php 
                        echo '<img class="w-[140px] mx-auto h-[140px] rounded-[25px] border-2 border-[#0b0f13] bg-[var(--color-secondary)]" src="' . (isset($LogoPath) ? $LogoPath : $schoolLogoPath) . '" />';
                        echo divider(false);

                        echo h5("Info");

                        echo isset($Website) ? iconLink("Website", "fa-solid fa-globe", null, $Website) : iconLink("Website", "fa-solid fa-globe", null, $schoolWebsite);
                        echo isset($cityName) ? iconLink($cityName, "fa-solid fa-location-dot", null) : "";
                        echo isset($countryName) ? iconLink($countryName, "fa-solid fa-flag", null) : "";
                        echo isset($schoolEmail) && $schoolEmail != null ? iconLink($schoolEmail, "fa-solid fa-envelope", null) : "";
                        echo isset($schoolPhoneNumber) && $schoolPhoneNumber != null ? iconLink($schoolPhoneNumber, "fa-solid fa-phone", null) : "";
                        
                        
                        echo divider(false);
                        echo isset($_GET['school']) ? h5("Courses") : h5("School");


                        if(isset($_GET['school']))
                        {
                            $query = "SELECT * FROM courses WHERE school_id = ?";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute([$_GET['school']]);

                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (!empty($results)) {
                                foreach ($results as $course) {
                                    echo iconLink($course['name'], "fa-solid fa-book", null, "../pages/details.php?course=" . $course['id']);
                                }
                            }


                        }else {
                            echo iconLink($schoolName, "fa-solid fa-school", "w-full truncate", "../pages/details.php?school=" . $SchoolId);
                            echo divider(false);
                        ?>
                            <form method="post" action="../scripts/<?php echo isset($_GET['school']) ? "school_application_send.php" : "course_application_send.php" ?>" class="block w-full">
                                <input type="hidden" id="to" name="to" value="<?php echo isset($_GET['school']) ? $_GET['school'] : $_GET['course']; ?>" >
                                <?php echo submitButton("Apply", false, "w-full"); ?>
                            </form>
                        <?php
                        
                        
                        }                        
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php echo userHeader(true, true, true, false, "../pages/browse.php", false, false, false)?>

</html> 