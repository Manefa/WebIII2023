<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer</title>
</head>
<body>
    <?php 
                    $id = $_GET['id'];
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "films";
                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "DELETE FROM `films` WHERE `films`.`id` = $id";
                    if (mysqli_query($conn, $sql)) {
                        header("Location: ../index.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
    ?> 
</body>
</html>