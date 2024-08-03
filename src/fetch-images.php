<?php
include '../include/db.php'; // Include database configuration

$response = array('status' => 0, 'message' => 'No images found.');

// Fetching images from the database
$query = $pdo->prepare("SELECT * FROM images ORDER BY uploaded_on DESC");
$query->execute();
$images = $query->fetchAll(PDO::FETCH_ASSOC);

if(count($images) > 0){
    $response['status'] = 1;
    $response['data'] = $images; // Returning images data
}

// Return response
echo json_encode($response);
?>
