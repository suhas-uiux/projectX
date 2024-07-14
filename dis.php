<?php
// Database credentials
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "fileupload";

// Create connection
$conn = mysqli_connect($server_name, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch uploaded images
$sql = "SELECT id, filename, filedata, filetype FROM pics";
$result = mysqli_query($conn, $sql);

// Check if there are any images
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $file_data = base64_encode($row['filedata']);
        $file_type = $row['filetype'];
        echo "<div><img src='data:$file_type;base64,$file_data' alt='" . $row['filename'] . "'></div>";
    }
} else {
    echo "No images found.";
}

// Close the database connection
mysqli_close($conn);
?>
