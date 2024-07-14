<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <div>
            <label for="title">Enter title of the project:</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="overv">Enter overview of the project:</label>
            <textarea type="text" id="overv" name="overv" ></textarea>
        </div>
        <div>
            <label for="disc">Write description of your project:</label>
            <textarea type="text" id="disc" name="disc" wrap:"hard"></textarea>
        </div>
        <div>
            <label for="choice">Mention different projects:</label>
            <textarea type="text" id="choice" name="choice" wrap:"hard"></textarea>
        </div>
        <div>
            <label for="ref">Mention references:</label>
            <textarea type="text" id="ref" name="ref" wrap:"hard"></textarea>
        </div>
        <div>
            <label for="name">Enter the project name:</label>
            <input type="text" id="name" name="name">
        </div>
        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value=""></option>
            <option value="intro">Intro</option>
            <option value="minor">Minor</option>
            <option value="major">Major</option>
        </select>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $overv = $_POST['overv'];
        $disc = $_POST['disc'];
        $choice = $_POST['choice'];
        $ref = $_POST['ref'];
        $role = $_POST['role'];
        $name = $_POST['name'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "projectx";
        $connection = mysqli_connect($servername, $username, $password, $database);

        if (!$connection) {
            die("The database is not connected: " . mysqli_connect_error());
        } 
        else 
        {
            echo "Connection successful.<br>";
            $title = nl2br(mysqli_real_escape_string($connection, $title));
            $overv = nl2br(mysqli_real_escape_string($connection, $overv));
            $disc = nl2br(mysqli_real_escape_string($connection, $disc));
            $choice = nl2br(mysqli_real_escape_string($connection, $choice));
            $ref = nl2br(mysqli_real_escape_string($connection, $ref));
            $role = nl2br(mysqli_real_escape_string($connection, $role));
            $name = nl2br(mysqli_real_escape_string($connection, $name));

            $insert = "INSERT INTO `details` (`title`, `name`, `overv`, `disc`, `choice`, `ref`, `role`) VALUES ('$title','$name','$overv','$disc','$choice','$ref','$role')";
            $res = mysqli_query($connection, $insert);

            if (!$res) {
                die("The data was not inserted: " . mysqli_error($connection));
            } else {
                echo "Inserted successfully.";
            }
        }
        mysqli_close($connection);
    }
    ?>
</body>
</html>
