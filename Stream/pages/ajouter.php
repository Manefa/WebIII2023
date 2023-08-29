<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <h1 class="mt-3 text-center text-danger fs-1">Ajouter un film</h1>
        </div>
        <div class="row">

            <?php
            $titre = "";
            $titreErreur = "";
            $image = "";
            $imageErreur = "";

            $erreur = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                //Si on entre, on est dans l'envoie du formulaire



                // titre du film

                if (empty($_POST['titre'])) {
                    $titreErreur = "Le titre est requis";
                    $erreur = true;
                } else {
                    $titre = test_input($_POST["titre"]);
                }

                // image du film

                if (empty($_POST['image'])) {
                    $imageErreur = "l'image est requise";
                    $erreur = true;
                } else {
                    $image = test_input($_POST["image"]);
                }

                // Inserer dans la base de données

                if ($erreur == false) {

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
                    $sql = "INSERT INTO `films` (`id`, `Image`, `Titre`) VALUES (NULL, '$image', '$titre')";
                    if (mysqli_query($conn, $sql)) {
                        header("Location: ../index.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }


                //SI erreurs, on réaffiche le formulaire 
            }
            if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
                //echo "Erreur ou 1ere fois";
                //echo $erreur;


            ?>
                <div class="col-md-6">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre du film</label>
                            <input type="text" class="form-control" id="titre" value="<?php echo $titre; ?>" name="titre">
                            <span style="color:red" ;><?php echo $titreErreur; ?></span>
                            <br>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="text" class="form-control" id="image" aria-describedby="imageHelp" name="image" value="<?php echo $image; ?>">
                            <span style="color:red" ;><?php echo $imageErreur; ?></span>
                            <br>
                        </div>

                        <button type="submit" class="btn btn-success">Ajouter</button>
                        <button type="submit" class="btn btn-dark"><a href="../index.php" style="color:white; text-decoration: none;">Retour a la page principale</a></button>

                    </form>
                </div>



            <?php
            }

            ?>

            <?php

            function test_input($data)
            {
                $data = trim($data);
                $data = addslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>