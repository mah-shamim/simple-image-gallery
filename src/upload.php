<?php
include '../include/db.php'; // Include database configuration
$response = array('status' => 0, 'message' => 'Form submission failed, please try again.');

if(isset($_FILES['image']['name'])){
    // Directory where files will be uploaded
    $targetDir = UPLOAD_DIRECTORY;
    $fileName = date('Ymd').'-'.str_replace(' ', '-', basename($_FILES['image']['name']));
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allowed file types
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)){
            // Insert file name into database
            $insert = $pdo->prepare("INSERT INTO images (file_name, uploaded_on) VALUES (:file_name, NOW())");
            $insert->bindParam(':file_name', $fileName);
            $insert->execute();
            if($insert){
                $response['status'] = 1;
                $response['message'] = 'Image uploaded successfully!';
            }else{
                $response['message'] = 'Image upload failed, please try again.';
            }
        }else{
            $response['message'] = 'Sorry, there was an error uploading your file.';
        }
    }else{
        $response['message'] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
}

// Return response
echo json_encode($response);
?>
