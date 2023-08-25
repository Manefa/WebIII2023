<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="welcomePost.php" method="post">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="name">
        <br>
        <input type="submit" value="envoyer">
    </form>
    <br><br>
    <form action="welcomeGet.php" method="get">
        <label for="name">NomGet</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">EmailGet</label>
        <input type="text" name="email" id="name">
        <br>
        <input type="submit" value="envoyer">
    </form>
</body>
</html>