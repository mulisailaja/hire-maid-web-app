<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include the database connection file
include 'db_connection.php';

$RequestMethod = $_SERVER["REQUEST_METHOD"];
    if (isset($_POST['content']) && is_array($_FILES['img']['tmp_name'])) {

        // Handle multiple file uploads
        // Get user input from the form and sanitize it

        $content = htmlspecialchars($_POST['content']);
        $files=is_array($_FILES['img']);
        // Directory to store uploaded images
        $targetDir = "notification_img/";

        // Loop through each uploaded file
        $fileNames = [];
        foreach ($_FILES['img']['tmp_name'] as $key => $tmp_name) {
            $fileName = basename($_FILES['img']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName;

            // Check if file already exists
            if (file_exists($targetFilePath)) {
                // Handle file name collision or take appropriate action
                // You can rename the file or skip uploading it
                $fileName = time() . '_' . $fileName;
                $targetFilePath = $targetDir . $fileName;
            }

            // Upload file to the server
            if (move_uploaded_file($_FILES['img']['tmp_name'][$key], $targetFilePath)) {
                // File uploaded successfully, save the file name to the database
                $fileNames[] = $fileName;
            } else {
                throw new Exception("Error uploading file " . $_FILES['img']['name'][$key]);
            }
        }

        // Convert array of file names to comma-separated string
        $imageNames = implode(',', $fileNames);

        // Insert image names and notification content into the database
        $sql = "INSERT INTO image_upload (image_name, message) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $content, $imageNames);

        if ($stmt->execute()) {
            // Notification details submitted successfully
            $Data = [
                'status' => 200,
                'message' => 'Notification submitted successfully'
            ];
        echo json_encode($Data);
        } else {
            throw new Exception("Error: " . $sql . "<br>" . $conn->error);
        }

        // Close the prepared statement
        $stmt->close();
    } 
    else{
        echo json_encode("false");

    }
?>