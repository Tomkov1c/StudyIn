<?php 
require_once "database.php";
session_start();

    if(isset($_POST['to'])) {
        $query = "INSERT INTO `aplications`(`from_user_id`, `school_id`) VALUES (?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$_SESSION['user_id'], $_POST['to']]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($results)) {
            $header = "Location: ../pages/details.php?school=" . $_POST['to'];
            header($header);
            die();
        }
    }

?>