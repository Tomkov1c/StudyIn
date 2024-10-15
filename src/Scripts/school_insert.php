<?php 
session_start();
include_once "../scripts/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and sanitize it
    $name = trim($_POST['name']);
    $type_id = (int)$_POST['type'];
    $teacher_id = (int)$_POST['teacher'];
    $city_id = (int)$_POST['city'];
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $website = trim($_POST['website']);

    // Basic validation
    if (empty($name) || empty($address)) {
        $_SESSION['error'] = "Please fill in all required fields.";
        header("Location: ../admin/school.php");
        exit();
    }

    // Prepare SQL statement
    $sql = "INSERT INTO schools (name, adress, city_id, website, email, phone_number, principal_user_id, type_id) 
            VALUES (:name, :address, :city_id, :website, :email, :phone, :teacher_id, :type_id)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':address' => $address,
        ':city_id' => $city_id,
        ':website' => $website,
        ':email' => $email,
        ':phone' => $phone,
        ':teacher_id' => $teacher_id,
        ':type_id' => $type_id
    ]);

    $_SESSION['success'] = "School created successfully!";
    header("Location: ../admin/create_new.php"); // Redirect to the same page or a success page
    exit();
}
?>
