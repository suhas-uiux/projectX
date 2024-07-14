<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>project</h2>
    <form method="POST">
      
        <td>
            <lable>enter the project name:</lable>
            <input type="text" id="project" name="project">
        </td>
        <lable>role</lable>
    <select id="role" name="role" required>
        <option value=""></option>
        <option value="intro">intro</option>
        <option value="minor">minor</option>
        <option value="major">major</option>
    </select>
    
    <input type="submit" value="Submit">
    </form>
   
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      
        $role=$_POST['role'];
       $project=$_POST['project'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "projectx";
        $connection = mysqli_connect($servername, $username, $password, $database);
        if (!$connection) 
        {
            die("The database is not connected: " . mysqli_connect_error());
        } 
        else
        {
            echo "Connection successful.";
            $insert = "INSERT INTO `porjtype` (`role`, `project`) VALUES ('$role', '$project');";
            $res = mysqli_query($connection, $insert);
            if (!$res) 
            {
                die("The data was not inserted: ".mysqli_error($connection));
            } 
            else 
            {
                echo "Inserted successfully.";
            }
        }
    }
?>
</body>
</html>