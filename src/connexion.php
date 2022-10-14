<?php
    session_start();
    // require('db.php');
    $user = "user";
    $pwd = "test";
    $bdd = new PDO('mysql:host=db;dbname=blog', $user, $pwd);
    if(isset($_POST['envoi'])){
        if (!isset($_POST['mail']) || !isset($_POST['password'])){
            echo 'vous avez pas remplis tous les champs';
        }else{
            $mail = htmlspecialchars($_POST['mail']);
            //securiser le mdp mais trouvé mieux 
            $password = htmlspecialchars($_POST['password']);
            $requete_connexion = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = ? and password = ?');
            $requete_connexion->execute(array($mail ,$password ));
            $verif_connexion = $requete_connexion->fetch(PDO::FETCH_ASSOC);
            $count = $requete_connexion->rowCount();
            if($requete_connexion->rowCount() > 0){
                $_SESSION['name'] = $verif_connexion["name"];
               
                $_SESSION['id_utilisateur'] = $verif_connexion["id_utilisateur"];
                $_SESSION['mail'] = $verif_connexion["mail"];
                header('Location: blog.php');
    
            }
            else{
                echo "mauvais mot de passe ou mauvaise adresse mail";            
            }
        }
    }
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
            <form action="connexion.php" method="POST">
                
                
                <input type="mail" id="mail" name="mail" placeholder="mail">
                <input type="password" id="password" name="password" placeholder="password">
                <input type="submit" id="name" name="envoi">

            </form>
            <div>

            </div>
        </div>
        
    </div>
    
</body>
</html>