<?php 
session_start();
include_once "../scripts/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prepare and sanitize form data
    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';
    $principal_id = (int) $_POST['principal'] ?? 0;
    $country = $_POST['country'] ?? '';
    $city = $_POST['city'] ?? '';
    $address = $_POST['address'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $website = $_POST['website'] ?? '';
    
    $logo_path = '';
    $banner_path = '';
    
    // Insert data into the database
    $query = "INSERT INTO `schools` (`name`, `adress`, `city_id`, `website`, `email`, `phone_number`, `principal_user_id`, `logo_path`, `banner_path`, `details_page_content`, `type_id`) 
              VALUES (:name, :address, (SELECT id FROM cities WHERE name = :city), :website, :email, :phone, :principal, :logo, :banner, '', (SELECT id FROM types WHERE name = :type))";

    $stmt = $pdo->prepare($query);
    
    $stmt->execute([
        ':name' => $name,
        ':address' => $address,
        ':city' => $city,
        ':website' => $website,
        ':email' => $email,
        ':phone' => $phone,
        ':principal' => $principal_id,
        ':logo' => $logo_path,
        ':banner' => $banner_path,
        ':type' => $type
    ]);

    if ($stmt) {
        echo "School added successfully!";
        header("Location: success_page.php"); // Redirect to a success page
    } else {
        echo "Error adding school.";
    }
}
?>
