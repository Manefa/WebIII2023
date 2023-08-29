<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Films</title>
</head>

<body>
    <div class="container-fluid ">
        <div class="row">
            <h1 class="mt-3 text-center text-danger fs-1">Stream</h1>
        </div>
        <div class="row mt-4">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $db = "films";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //echo "Connected successfully <br>";

            // Ecriture de la requete
            $sql = "SELECT *  FROM films";

            // Interogation de la BD
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="card mx-3 " style="width: 18rem;">
                        <img src="<?php echo $row["Image"];   ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["Titre"];   ?></h5>
                            <a href="pages/modifier.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Modifier</a>
                        </div>
                    </div>
            <?php }
            } else {
                echo "0 results";
            }
            $conn->close();

            ?>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="  col-md-12 mt-4 mx-2 justify-content-around">
                    <button type="button" class="btn btn-success"><a href="pages/ajouter.php" style="color:white; text-decoration: none;">Ajouter</a></button>
                </div>
            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>