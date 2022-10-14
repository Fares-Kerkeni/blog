<?php
    session_start();
    require('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        
        <div class="formulaire">
            <p>Connexion</p>
            <form action="index.php">
                
                
                <input type="mail" id="mail" name="mail" placeholder="mail">
                <input type="password" id="password" name="password" placeholder="password">
                <input type="submit" id="name" name="name">

            </form>
            <div>

            </div>
        </div>
        
    </div>
    
</body>
</html>