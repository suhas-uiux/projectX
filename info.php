<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        p {
            margin: 10px;
            font-family: "Inter", sans-serif;
        }
        body {
            background-color: rgba(62, 2, 92, 1);
        }
        .info p a{
            text-decoration-line: none;
            font-size: larger;
        }

        .boxex {
            color: white;
            background-color: rgba(126, 125, 125, 0.658);
            margin: 8px;
            font-size: 24px;
            border-radius: 25px;
            padding: 10px;
        }

        .info {
            height: 155px;
            width: 280px;
            padding: 20px;
            margin: 20px;
            border-radius: 25px;
            background-color: aliceblue;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
        }

        .infos {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
            max-height: 80vh;
            overflow-y: scroll;
           
        }

        .info:hover {
            background-color: aliceblue;
            box-shadow: 2px 2px 20px 5px #7805e4;
            transform: scale(1.1);
            text-shadow: 0px 0px 2px white;
          
        }

        ::-webkit-scrollbar {
            width: 7px;
            height: 5px;
            margin-right: 20px;
        }

        ::-webkit-scrollbar-track {
            background: #333;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "projectx";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("The database not connected: " . mysqli_connect_error());
    } else {
        // Select query

        // Get the role from the URL parameter
        $role = isset($_GET['role']) ? $_GET['role'] : '';

        if (in_array($role, ['intro', 'minor', 'major'])) {
            $sql = "SELECT * FROM `details` WHERE role='$role'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='infos'>";
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='info'>
                        <p><a href='display_name.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></p>
                    </div>";
                }
                echo "</div>";
            } else {
                echo "No results found for role: $role";
            }
        } else {
            echo "Invalid role specified";
        }
    }
    ?>
</body>

</html>
