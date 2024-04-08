<?php
// Your database connection code here

// Get the parameters from the AJAX request
$Category = $_GET["CatID"];
$shiftStartTime = $_GET["shiftStartTime"];
$shiftEndTime = $_GET["shiftEndTime"];

// Perform the availability check query here based on the provided shift start and end times
// Modify this query based on your database schema and requirements

// Your query goes here (replace the placeholder with your actual availability check query)
$query = "SELECT * FROM tblmaidbooking WHERE CatID = '$Category' AND shift_start_time <= '$shiftStartTime' AND shift_end_time >= '$shiftEndTime'";

$result = $conn->query($query);

// Process the result and display the availability
if ($result->num_rows > 0) {
    // Display available timings
    echo "Maid is available during the selected shift timings.";
} else {
    // Display not available message
    echo "Maid is not available during the selected shift timings.";
}

// Close the database connection
$conn->close();
?>
