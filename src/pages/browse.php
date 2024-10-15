<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <?php include "../components/MustInclude.php";
    include_once "../scripts/database.php";
    session_start(); 
    ?>
    <link rel="stylesheet" src="../CSS/browse.css">
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 flex flex-col gap-[25px] 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] py-[75px]">
    <?php echo h3("Search")?>
    <div class="flex gap-5">
        <?php echo filterButton("Courses", null, null);
                echo filterButton("School", null, null)?>
    </div>
    <?php echo basicInputField("Search", null, null, null); ?>
    <div class="flex-wrap gap-5 flex w-full" data-search="schools">
        <?php
                $query = "SELECT DISTINCT
                c.id AS course_id,
                c.name AS course_name,
                c.school_id AS course_school_id,
                c.website AS course_website,
                c.logo_path AS course_logo_path,
                c.banner_path AS course_banner_path,
                c.details_page_content AS course_details,
                s.name AS school_name,
                s.banner_path AS school_banner,
                AVG(r.rating) AS average_rating
    
                FROM 
                    courses AS c
                JOIN 
                    schools AS s ON c.school_id = s.id
                LEFT JOIN 
                    ratings AS r ON c.id = r.course_id
                GROUP BY 
                    c.id, c.name, c.school_id, c.website, c.logo_path, 
                    c.banner_path, c.details_page_content, s.id, s.name, s.banner_path;
                ";
                
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if (empty($results)) {
                    echo "Doesn't exist";
                    die();
                }
                
                foreach ($results as $course) {
                    echo display($course['course_name'], $course['school_name'], '<i class="fa-solid fa-star text-[var(--color-text)] mr-1"></i>' . (int)$course['average_rating'], $course['school_banner'], "course max-w-[33%]");
                }

            
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
                            LEFT JOIN cities ON schools.city_id = cities.id
                            LEFT JOIN regions ON cities.region_id = regions.id
                            LEFT JOIN countries ON regions.country_id = countries.id
                            LEFT JOIN users ON schools.principal_user_id = users.id
                            LEFT JOIN types ON schools.type_id = types.id
                            LEFT JOIN ratings ON schools.id = ratings.school_id
                        GROUP BY
                            schools.id, schools.name, schools.adress, schools.website,
                            schools.email, schools.phone_number, schools.logo_path,
                            schools.banner_path, schools.details_page_content,
                            cities.name, cities.post_code, regions.name, countries.name,
                            users.first_name, users.last_name, types.name; ";
                $stmt = $pdo->prepare($query);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($result == null) {
                    echo "Doesn't exist";
                    die();
                }

                foreach ($result as $school) {
                    if (is_array($school)) {
                        echo display(
                            $school['school_name'], 
                            $school['city_name'], 
                            '<i class="fa-solid fa-star text-[var(--color-text)] mr-1"></i>' . (int)$school['average_rating'],  
                            $school['school_banner_path'], 
                            "school max-w-[33%]"
                        );
                    } else {
                        echo "Error: School data is not an array.";
                    }
                }
        ?>

    </div>

</body>
<script src="../scripts/browseFilters.js"></script>

<?php include_once "../scripts/get_pfp.php";?>

<div class="w-[82px] transform -translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-text)] outline-[2px] rounded-2xl left-[1%] flex-col justify-start items-center gap-[15px] inline-flex fixed top-1/2">
    <a href="../pages/profile.php?user=<?php echo $_SESSION['user_id'] ?>"><img class="self-stretch h-[52px] rounded-md border-2 border-[var(--color-text)]" src="<?php echo $_SESSION['pfp']; ?>" /></a>
    <a href="../pages/browse.php" class="self-stretch h-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-magnifying-glass"></i></a>
    <a href="../pages/account-settings.php" class="self-stretch h-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-gear"></i></a>
    <?php echo divider(false); ?>
    <a href="../scripts/user_logout.php" class="self-stretch h-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-door-open"></i></a>
</div>


</html> 