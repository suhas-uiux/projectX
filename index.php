<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <form  method="post" enctype="multipart/form-data">
        <label for="file">Choose file to upload:</label>
        <input type="file" name="file" id="file">
        <button type="submit" name="submit">Upload</button>
    </form>
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

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the file information
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $file_type = $_FILES['file']['type'];

    // Check for errors
    if ($file_error === 0) {
        // Read the file content into a variable
        $file_data = file_get_contents($file_tmp_name);

        // Prepare the SQL statement
        $sql = "INSERT INTO pics (filename, filedata) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sb", $file_name, $file_data);
        mysqli_stmt_send_long_data($stmt, 1, $file_data);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error uploading file.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

</body>

</html>
