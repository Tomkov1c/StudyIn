<?php
include_once 'database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$target_dir = "../uploads/";

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$prefix_name = uniqid() . $_SESSION['user_id'];
$filename = basename($_FILES["fileToUpload"]["name"]);
$filename = preg_replace("/[^a-zA-Z0-9\.\-_]/", "", $filename);
$target_file = $target_dir . $prefix_name . $filename;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if ($_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
    echo "Error uploading file.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $uploadOk = 0;
    echo "File is too large.";
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $uploadOk = 0;
    echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
}

if ($uploadOk == 1) {
    try {
        $query = "SELECT `profile_picture_path` FROM `users` WHERE `id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_SESSION['user_id']]);
        $currentPicturePath = $stmt->fetchColumn();

        if ($currentPicturePath && file_exists($currentPicturePath)) {
            unlink($currentPicturePath);
        }

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Update the database with the new profile picture path
            $updateQuery = "UPDATE `users` SET `profile_picture_path` = ? WHERE `id` = ?";
            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->execute([$target_file, $_SESSION['user_id']]);

            header("Location: ../pages/account-settings.php");
            exit();
        } else {
            echo "Error moving the uploaded file.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "File upload failed.";
}
?>
