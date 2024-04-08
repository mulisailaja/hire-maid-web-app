<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include the database connection file
include 'db_connection.php';

$RequestMethod = $_SERVER["REQUEST_METHOD"];
if (isset($_POST['content']) && !empty($_FILES['img'])) {

    // Handle single file upload
    // Get user input from the form and sanitize it
    
    $content = $_POST['content'];
    
    // Get the temporary file path and name
    $tmp_name = $_FILES['img']['tmp_name'];
    // Get the original file name
    $fileName = basename($_FILES['img']['name']);
    // Directory to store uploaded images
    $targetDir = "notification_img/";

    // Check if file already exists
    $targetFilePath = $targetDir . $fileName;
    if (file_exists($targetFilePath)) {
        // Handle file name collision or take appropriate action
        // You can rename the file or skip uploading it
        $fileName = time() . '_' . $fileName;
        $targetFilePath = $targetDir . $fileName;
    }

    // Upload file to the server
    if (move_uploaded_file($tmp_name, $targetFilePath)) {
        // Insert image name and notification content into the database
        $sql = "INSERT INTO image_upload (image_name, message) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $fileName, $content);

        if ($stmt->execute()) {
            // Notification details submitted successfully
            $response = array(
                'status' => 200,
                'message' => 'Notification submitted successfully'
            );
            echo json_encode($response);
        } else {
            throw new Exception("Error: " . $sql . "<br>" . $conn->error);
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        throw new Exception("Error uploading file " . $_FILES['img']['name']);
    }
} else {
    // Handle case when content or image data is missing
    throw new Exception("Content or image data missing");
}
?>