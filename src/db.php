<?php
  // $pdo = new PDO(dsn:"mysql:host=database:3306;dbname=php_db", username:"root", password:"password");
//   echo "coucou fares";
$user = "user";
$pwd = "test";
$bdd = new PDO('mysql:host=db;dbname=blog', $user, $pwd);
      //On vérifie la connexion
//   if($pdo){
//     echo 'Connexion réussie';
//   }else{
//     echo 'ff15';
//   }
    

?>