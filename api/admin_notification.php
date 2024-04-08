<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include the database connection file
include 'db_conn.php';

$RequestMethod = $_SERVER["REQUEST_METHOD"];

if ($RequestMethod == "POST") {
    try {
        // Check if the form has been submitted
        if (isset($_POST['content']) && !empty($_FILES['img']) && is_array($_FILES['img']['tmp_name'])) {
            // Handle multiple file uploads
            // Get user input from the form and sanitize it
            $content = htmlspecialchars($_POST['content']);
            // Directory to store uploaded images
            $targetDir = "notification_img/";

            // Initialize an empty string to store file names
            $imageNames = '';

            // Loop through each uploaded file
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
                    // Append file name to the list
                    if (!empty($imageNames)) {
                        $imageNames .= ',';
                    }
                    $imageNames .= $fileName;
                } else {
                    throw new Exception("Error uploading file " . $_FILES['img']['name'][$key]);
                }
            }

            // Insert image names and notification content into the database
            $sql = "INSERT INTO admin_notification (message, uploadnotify) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $content, $imageNames);

            if ($stmt->execute()) {
                // Notification details submitted successfully
                $response = array(
                    'status' => 200,
                    'message' => 'Notification submitted successfully'
                );
            } else {
                throw new Exception("Error: " . $sql . "<br>" . $conn->error);
            }

            // Close the prepared statement
            $stmt->close();
        } elseif (isset($_POST['content']) && !empty($_FILES['img'])) {
            // Handle single file upload
            // Get user input from the form and sanitize it
            $content = htmlspecialchars($_POST['content']);

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
                $sql = "INSERT INTO admin_notification (message, uploadnotify) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $content, $fileName);

                if ($stmt->execute()) {
                    // Notification details submitted successfully
                    $response = array(
                        'status' => 200,
                        'message' => 'Notification submitted successfully'
                    );
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

        // Close the database connection
        $conn->close();

        http_response_code(200);
        echo json_encode($response);
    } catch (Exception $e) {
        $response = array(
            'status' => 500,
            'message' => 'Server Error: ' . $e->getMessage()
        );

        http_response_code(500);
        echo json_encode($response);
    }
} else {
    $response = array(
        'status' => 405,
        'message' => $RequestMethod . ' Method Not Allowed'
    );

    http_response_code(405);
    echo json_encode($response);
}
?>
