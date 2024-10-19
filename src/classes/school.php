<?php
class School {
    // School properties (basic information)
    public $id;
    public $name;
    public $address;
    public $website;
    public $email;
    public $phone_number;
    public $logo_path;
    public $banner_path;
    public $details_page_content;

    // Related data (from foreign keys)
    public $city;         // Stores the full city data
    public $region;       // Stores the full region data
    public $country;      // Stores the full country data
    public $principal;    // Stores the full principal (user) data
    public $school_type;  // Stores the full school type data

    // Constructor to initialize with school ID
    public function __construct($school_id) {
        $this->id = $school_id;
    }

    // Fetches the school data along with all related foreign key data
    public function getSchoolData($pdo) {
        // Fetch school data from "schools" table
        $querySchool = "SELECT * FROM schools WHERE id = ?";
        $stmtSchool = $pdo->prepare($querySchool);
        $stmtSchool->execute([$this->id]);

        if ($schoolData = $stmtSchool->fetch(PDO::FETCH_ASSOC)) {
            // Populate school fields
            $this->name = $schoolData['name'];
            $this->address = $schoolData['adress'];
            $this->website = $schoolData['website'];
            $this->email = $schoolData['email'];
            $this->phone_number = $schoolData['phone_number'];
            $this->logo_path = $schoolData['logo_path'];
            $this->banner_path = $schoolData['banner_path'];
            $this->details_page_content = $schoolData['details_page_content'];

            // Fetch the foreign key-related data
            $this->city = $this->getCityData($pdo, $schoolData['city_id']);
            $this->principal = $this->getPrincipalData($pdo, $schoolData['principal_user_id']);
            $this->school_type = $this->getTypeData($pdo, $schoolData['type_id']);

            return $this;
        } else {
            return null;  // School not found
        }
    }

    // Get city, region, and country data based on city_id
    private function getCityData($pdo, $city_id) {
        $queryCity = "
            SELECT cities.*, 
                   regions.name as region_name, 
                   regions.id as region_id, -- Ensure to select the region ID
                   countries.id as country_id, -- This is the missing part
                   countries.name as country_name, 
                   countries.calling_code
            FROM cities
            JOIN regions ON cities.region_id = regions.id
            JOIN countries ON regions.country_id = countries.id
            WHERE cities.id = ?";
        
        $stmtCity = $pdo->prepare($queryCity);
        $stmtCity->execute([$city_id]);
    
        if ($cityData = $stmtCity->fetch(PDO::FETCH_ASSOC)) {
            // Return an associative array with city, region, and country details
            return [
                'id' => $cityData['id'],
                'name' => $cityData['name'],
                'post_code' => $cityData['post_code'],
                'region' => [
                    'id' => $cityData['region_id'], // Use the selected region_id
                    'name' => $cityData['region_name'],
                    'country' => [
                        'id' => $cityData['country_id'], // Use the selected country_id
                        'name' => $cityData['country_name'],
                        'calling_code' => $cityData['calling_code']
                    ]
                ]
            ];
        }
        return null;  // City not found
    }
    

    // Get principal user data based on principal_user_id
    private function getPrincipalData($pdo, $principal_user_id) {
        if ($principal_user_id) {
            $queryPrincipal = "SELECT * FROM users WHERE id = ?";
            $stmtPrincipal = $pdo->prepare($queryPrincipal);
            $stmtPrincipal->execute([$principal_user_id]);

            if ($principalData = $stmtPrincipal->fetch(PDO::FETCH_ASSOC)) {
                // Return an associative array with the principal user data
                return [
                    'id' => $principalData['id'],
                    'first_name' => $principalData['first_name'],
                    'last_name' => $principalData['last_name'],
                    'email' => $principalData['email'],
                    'profile_picture_path' => $principalData['profile_picture_path']
                ];
            }
        }
        return null;  // Principal not found or no principal assigned
    }

    // Get school type data based on type_id
    private function getTypeData($pdo, $type_id) {
        if ($type_id) {
            $queryType = "SELECT * FROM types WHERE id = ?";
            $stmtType = $pdo->prepare($queryType);
            $stmtType->execute([$type_id]);

            if ($typeData = $stmtType->fetch(PDO::FETCH_ASSOC)) {
                // Return an associative array with school type details
                return [
                    'id' => $typeData['id'],
                    'name' => $typeData['name'],
                    'description' => $typeData['description']
                ];
            }
        }
        return null;  // Type not found
    }
}
?>
