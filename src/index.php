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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="hd">
      <div>

      </div>
      <div class="text">
        <p>Inscrit toi où connecte toi !</p>
        <p>Tu veux naviguer en tant qu'invité ? Swipe vers le bas !</p>
        <div class="lien">
          <a href="inscription.php">inscriptin</a>
          <a href="connexion.php">connexion</a>
        </div>
        
      </div>
      
      <div class="bas">
        <img src="fleche.png" alt="">
      </div>
    </div>

    
  </div>
</body>
</html>
