<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="text-center">

    <div class="container-fluid">
        <div class="row justify-content-center">
            <?php



            $nom = "";
            $motDePasse = "";
            $nomErreur = "";
            $motDePasseErreur = "";
            $loginErreur = false;
            $erreur =  false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                //Si on entre, on est dans l'envoie du formulaire


                // nom utilisateur

                if (empty($_POST['nom'])) {
                    $erreur = true;
                    $nomErreur = "le nom de l'usager est requis !";
                } else {
                    $nom = test_input($_POST["nom"]);
                }

                // mot de passe utilisateur

                if (empty($_POST['motDePasse'])) {
                    $erreur = true;
                    $motDePasseErreur = "le mot de passe est requis !";
                } else {
                    $motDePasse = test_input($_POST["motDePasse"]);
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
                    
                    $sql = "SELECT * FROM `users` WHERE `user` = '$nom' AND `password` = SHA1('$motDePasse')";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        $row = $result->fetch_assoc();
                        $_SESSION["connexion"] = true;
                        header("Location: ../index.php");
                    } else {
                        $loginErreur = true;
                        //echo "<h1>Nom d'usager ou mot de passe invalide</h1>";
                    }
                    mysqli_close($conn);
                }


                //SI erreurs, on réaffiche le formulaire 
            }
            if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true | $loginErreur == true) {

                //echo "Erreur ou 1ere fois";
                //echo $erreur;


            ?>
                <div class="offset col-md-4 mt-5">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <img class="mb-4" src="../images/spotify.png" alt="Oups !">
                        <?php
                        if($loginErreur == true){
                           echo '<span style="color:red" ;>nom usager ou mot de passe incorrect</span>'; 
                        } 
                        ?>
                        <h1 class="h3 mb-3 fw-normal">Connecter vous !</h1>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="nom" value="<?php echo $nom; ?>" placeholder="John Doe">
                            <label for="floatingInput">Email address</label>
                            <span style="color:red" ;><?php echo $nomErreur; ?></span>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="password" class="form-control" name="motDePasse" id="floatingPassword" value="<?php echo $motDePasse; ?>" placeholder="Password">
                            <label for="floatingPassword">Mot de passe</label>
                            <span style="color:red" ;><?php echo $motDePasseErreur; ?></span>
                        </div>

                        <div class="checkbox mb-3 mt-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Se souvenir de moi !
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-danger fw-bold" type="submit">Connexion</button>
                    </form>

                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php

    function test_input($data)
    {
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    <div id="torrent-scanner-popup" style="display: none;"></div><deepl-input-controller></deepl-input-controller>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>