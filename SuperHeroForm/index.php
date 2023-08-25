<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="resultatPost.php" method="post">
        <label for="">nom</label>
        <input type="text" name="name" id=""> <br>
        <label for="">image</label>
        <input type="text" name="image" id=""> <br>

        <input type="submit" value="envoyer">
    </form>

   

    <form action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <label for="">nom</label>
        <input type="text" name="name" id=""> <br>
        <label for="">image</label>
        <input type="text" name="image" id=""> <br>

        <input type="submit" value="envoyer">
    </form>

    <br><br><br>

    <form action="resultatGet.php" method="get">
        <label for="">nomget</label>
        <input type="text" name="name" id=""> <br>
        <label for="">imageget</label>
        <input type="text" name="image" id=""> <br>

        <input type="submit" value="envoyerget">
    </form>
</body>
</html>