<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <?php include "../components/MustInclude.php";
    ?>
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 p-[75px] flex flex-col gap-[25px]">
<?php echo myHeader() ?>
<div class="justify-start items-start gap-[50px] inline-flex">
    <div class="w-[20%] p-[25px] sticky top-[12rem] bg-[var(--color-terciary)] rounded-md border-2 border-[#0b0f13] flex-col justify-start items-start gap-2.5 inline-flex">
        <?php echo h5("Categories") ?>
        <?php echo indexButton("All", fullWidth: true, additionalClasses: "mb-2", href: "browse.php")?>
        <?php echo indexButton("Schools", true, additionalClasses: "mb-2", href: "browse.php?browse=schools")?>
        <?php echo indexButton("Courses", true, additionalClasses: "mb-2", href: "browse.php?browse=courses")?>
    </div>
    <div class="w-[75%] grow shrink basis-0 flex-col justify-start items-start gap-2.5 inline-flex">
        <?php 
            function getAllCourses($pdo) {
                $query = "SELECT co.name as courses_name,
                                co.id as courses_id,
                                s.name as school_name,
                                uc.from as school_from,
                                uc.untill as school_until,
                                s.school_image_path as school_image_path                   
                          FROM users u 
                          INNER JOIN users_courses uc ON u.id = uc.user_id 
                          INNER JOIN course co ON uc.course_id = co.id 
                          INNER JOIN schools s ON co.school_id = s.id 
                          INNER JOIN city c ON s.city_id = c.id 
                          INNER JOIN countries ct ON c.county_id = ct.id";
            
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                foreach ($userData as $data) {
                    // Display school and course information
                    echo display(
                        htmlspecialchars($data['courses_name']), 
                        organizer: htmlspecialchars($data['school_name']), 
                        year: htmlspecialchars(date("Y", strtotime($data['school_from'])) . " - " . 
                            ($data['school_until'] !== '0000-00-00 00:00:00' ? date("Y", strtotime($data['school_until'])) : 'Present')), 
                        image: htmlspecialchars($data['school_image_path']),
                        additionalClasses: "w-full",
                        href: "details.php?course=" . htmlspecialchars($data['courses_id']) . '"'
                    );
                }
            }
            
            function getAllSchools($pdo) {
                $query = "SELECT s.name as school_name,
                                s.id as school_id,
                                us.from as school_from,
                                us.untill as school_until,
                                s.school_image_path as school_image_path                   
                          FROM users u 
                          INNER JOIN users_schools us ON u.id = us.user_id 
                          INNER JOIN schools s ON us.school_id = s.id 
                          INNER JOIN city c ON s.city_id = c.id 
                          INNER JOIN countries ct ON c.county_id = ct.id";
            
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                foreach ($userData as $data) {
                    // Display school information
                    echo display(
                        htmlspecialchars($data['school_name']), 
                        organizer: "", // No organizer for schools
                        year: htmlspecialchars(date("Y", strtotime($data['school_from'])) . " - " . 
                            ($data['school_until'] !== '0000-00-00 00:00:00' ? date("Y", strtotime($data['school_until'])) : 'Present')), 
                        image: htmlspecialchars($data['school_image_path']),
                        additionalClasses: "w-full",
                        href: "details.php?school=" . htmlspecialchars($data['school_id']) . '"'
                    );
                }
            }
            
            // Include the database connection script
            include_once "../scripts/database.php"; 
            
            // Check the 'browse' parameter to determine which data to retrieve
            if (isset($_GET['browse']) && $_GET['browse'] === 'schools') {
                getAllSchools($pdo);
            } else if (isset($_GET['browse']) && $_GET['browse'] === 'courses') {
                getAllCourses($pdo);
            } else {
                getAllSchools($pdo); // Default behavior
                getAllCourses($pdo);
            }
            
            
        ?>
    </div>
</div>
</body>
</html> 