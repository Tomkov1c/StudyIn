<?php
include_once "../scripts/database.php"; // Include your database connection

// Check if country_id is set
if (isset($_GET['country_id'])) {
    $countryId = (int)$_GET['country_id']; // Get the country ID from the request

    // Fetch cities based on the country ID
    $query = "SELECT id, name FROM cities WHERE country_id = ?"; // Adjust table and column names as necessary
    $stmt = $pdo->prepare($query);
    $stmt->execute([$countryId]);
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results

    // Return the cities as a JSON array
    echo json_encode($cities);
}
?>