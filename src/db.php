<?php
  // $pdo = new PDO(dsn:"mysql:host=database:3306;dbname=php_db", username:"root", password:"password");
//   echo "coucou fares";
  $dsn = "mysql:host=db";
  $user = "user";
  $pwd = "test";
  $pdo = new PDO($dsn, $user, $pwd);
      //On vérifie la connexion
//   if($pdo){
//     echo 'Connexion réussie';
//   }else{
//     echo 'ff15';
//   }
    

?>