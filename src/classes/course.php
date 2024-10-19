<?php
class Course {
    // Course properties
    public $id;
    public $name;
    public $website;
    public $logo_path;
    public $banner_path;
    public $details_page_content;

    // Nested School object
    public $school;  // This will hold the School object

    // Constructor to initialize with course ID
    public function __construct($course_id) {
        $this->id = $course_id;
    }

    // Fetches the course data along with related school data
    public function getCourseData($pdo) {
        // Fetch course data from "courses" table
        $queryCourse = "SELECT * FROM courses WHERE id = ?";
        $stmtCourse = $pdo->prepare($queryCourse);
        $stmtCourse->execute([$this->id]);

        if ($courseData = $stmtCourse->fetch(PDO::FETCH_ASSOC)) {
            // Populate course fields
            $this->name = $courseData['name'];
            $this->website = $courseData['website'];
            $this->logo_path = $courseData['logo_path'];
            $this->banner_path = $courseData['banner_path'];
            $this->details_page_content = $courseData['details_page_content'];

            // Fetch the associated school data
            $this->school = $this->getSchoolData($pdo, $courseData['school_id']);
            return $this;
        } else {
            return null;  // Course not found
        }
    }

    // Fetches the school data based on school_id
    private function getSchoolData($pdo, $school_id) {
        $school = new School($school_id);  // Create a new School object
        return $school->getSchoolData($pdo);  // Fetch and return the school data
    }
}
?>
