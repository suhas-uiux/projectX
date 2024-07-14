<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
    p {
        margin: 10px;
        white-space: pre-wrap;
        font-family: "Inter", sans-serif;
        font-size: large;
    }
    h2{
        font-family: "Inter", sans-serif;
 
    }
    h3{
        font-family: "Inter", sans-serif;
    }
    li{
        padding-left:20px;
    }
    body {
        background-color: rgba(62, 2, 92, 1);

    }
    .boxex {
        color: white;
        background-color: rgba(126, 125, 125, 0.658);
        margin: 8px;
        font-size: 24px;
        display:flex;
        justify-content: center;
        border-radius: 25px;
        padding: 10px;
    }
    .info {
        height: 155px;
        width: 280px;
        padding: 20px;
        margin: 10px;
       
        border-radius: 25px;
        background-color: aliceblue;
    }
    .infos{
        display:flex;
        flex-wrap:wrap;
        align-items: center;
        justify-content:center;
        max-height: 80vh;
        overflow-y: scroll;
        width:1191px;
        margin: auto;
    }
    ::-webkit-scrollbar {
    width: 7px;
    height: 5px;
    margin-right: 20px;
   }
  

  /* ::-webkit-scrollbar-track {
    background: #333; 
  } */
  
  
  ::-webkit-scrollbar-thumb {
    background: #888; 
  }
  

  ::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  .container{
    padding:3px;
    height: 100%;
    width: 100%;
    border-radius: 20px;
    background-color: rgba(126, 125, 125, 0.300);
    font-size:x-large;
  }
</style>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_GET['id'];


$sql ="SELECT * FROM `details` WHERE id='$id'";

$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Error in SELECT query: " . mysqli_error($conn));
}
$num = mysqli_num_rows($res);


// Fetch and display results
if ($num > 0) 
{
    while ($row = mysqli_fetch_assoc($res))
   {
 echo " <div class='boxex'>
           <h2>"
               .$row['title']."
           </h2>
       </div>
       <div class='infos'>
       <div class='container' style='width:1316px;'>
           <h3>OVERVIEW</h3>
           <p>".$row['overv']."</p>
           <hr>
           <h3>DISCRIPTION</h3>
           <p>".$row['disc']."</p>
           <hr>
           <h3>PROJECT IDEAS</h3>
           <p>".$row['choice']."</p>
           <hr>
           <h3>REFERENCE</h3>
           <p>".$row['ref']."</p>
       </div>
</div>";
  }
}
?>

</body>

</html>

