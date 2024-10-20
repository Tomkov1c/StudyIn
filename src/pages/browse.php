<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <?php include "../components/MustInclude.php";
    include_once "../scripts/database.php";
    include_once "../classes/course.php";
    include_once "../classes/school.php";
    session_start(); 
    include_once "../Scripts/login_refresh.php";
    ?>
    <link rel="stylesheet" src="../CSS/browse.css">
</head>
<body class="light bg-[var(--color-background)] w-screen m-0 flex flex-col gap-[25px] 2xl:px-[175px] xl:px-[80px] lg:px-[50px] px-[25px] py-[75px]">
    <?php echo h3("Search")?>
    <div class="flex gap-5">
        <?php 
            if(isset($_GET['filter']) && $_GET['filter'] == 'courses') {
                echo toggledFilterButton("Courses", null, "../pages/browse.php");
                echo filterButton("School", null, "../pages/browse.php?filter=schools");
            }else if (isset($_GET['filter']) && $_GET['filter'] == 'schools') {
                echo filterButton("Courses", null, "../pages/browse.php?filter=courses");
                echo toggledFilterButton("School", null, "../pages/browse.php");
            }else {
                echo filterButton("Courses", null, "../pages/browse.php?filter=courses");
                echo filterButton("School", null, "../pages/browse.php?filter=schools");
            }
        ?>
    </div>
    <?php echo divider(false); ?>
    <div class="flex-wrap gap-5 flex flex-col lg:flex-row w-full" data-search="schools">
        <?php
                function outputCourses($pdo) {
                    $query = "SELECT DISTINCT id FROM courses";
                
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();
                    
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    if (empty($results)) {
                    }
                    
                    foreach ($results as $course) {
                        // Initialize Course object and fetch course data
                        $courseInfo = new Course($course['id']);
                        $courseData = $courseInfo->getCourseData($pdo);
                    
                        // Check if course data is available before displaying it
                        if ($courseData) {
                            // Use the display function (assuming it expects course name as argument)
                            echo display($courseData->name, $courseData->school->name, null, isset($courseData->banner_path) ? $courseData->banner_path : $courseData->school->banner_path, "lg:max-w-[calc((100%-2.5rem)/3)] lg:w-full w-full", "../pages/details.php?course=" . $course['id']);
                        }
                    }
                }
                function outputSchools($pdo) {
                    $query = "SELECT DISTINCT id FROM schools";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result == null) {
                    }

                    foreach ($result as $school) {
                        // Initialize School object and fetch school data
                        $schoolInfo = new School($school['id']);
                        $schoolData = $schoolInfo->getSchoolData($pdo);
                    
                        // Check if school data is available before displaying it
                        if ($schoolData && isset($schoolData->city['name'])) {
                            // Access the city name as an array element
                            echo display($schoolData->name, $schoolData->city['name'], $schoolData->city['region']['name'] . ', ' . $schoolData->city['region']['country']['name'], $schoolData->banner_path, "w-full ", "../pages/details.php?school=" . $school['id']);
                        }
                    }
                }
                
                if(isset($_GET['filter']) && $_GET['filter'] == 'courses') {
                    outputCourses($pdo);
                }else if (isset($_GET['filter']) && $_GET['filter'] == 'schools') {
                    outputSchools($pdo);
                }else {
                    outputSchools($pdo);
                    outputCourses($pdo);
                }

        ?>

    </div>

</body>
<script src="../scripts/browseFilters.js"></script>

<?php echo userHeader(true, true, true, true, false, true, true, true)?>


</html> 