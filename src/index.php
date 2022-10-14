<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <?php
  // $pdo = new PDO(dsn:"mysql:host=database:3306;dbname=php_db", username:"root", password:"password");
  echo "coucou fares";
  $dsn = "mysql:host=db";
  $user = "user";
  $pwd = "test";
  $pdo = new PDO($dsn, $user, $pwd);
      //On vérifie la connexion
  if($pdo){
    echo 'Connexion réussie';
  }else{
    echo 'ff15';
  }
    

?>

</body>
</html>