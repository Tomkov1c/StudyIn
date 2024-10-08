<?php
include_once 'database.php';

$first_name = $_POST['name'];
$last_name = $_POST['surname'];
$email = $_POST['email'];
$pass1 = $_POST['password'];
$pass2 = $_POST['confpassword'];

if (!empty($email) && !empty($pass1) && ($pass1 == $pass2)) {
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() > 0) {
        header("Location: ../pages/signup.php?error=email_exists");
        exit();
    }
    $pass = sha1($pass1 . $salt);
    
    $query = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$first_name, $last_name, $email, $pass]);
    
    header("Location: ../pages/login.php");
} else {
    header("Location: ../pages/signup.php?error=invalid_input");
}
?>
