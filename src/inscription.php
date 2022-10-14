<?php
    session_start();
     require('db.php');
    
  

//si le boutton est active
if(isset($_POST['envoi'])){
    if (!isset($_POST['name']) || !isset($_POST['mail']) || !isset($_POST['password'])){
        echo 'vous avez pas remplis tous les champs';
    }else{
        // pour que l'utilisateur de rentre pas de l'html
        $name = htmlspecialchars($_POST['name']);
        $mail = htmlspecialchars($_POST['mail']);
        //securiser le mdp mais trouvé mieux 
        $password = htmlspecialchars($_POST['password']);
        
        
        // verifie si le mail est deja dans la base de donnée
        $verif_mail = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = '".$mail."'");
        $verif_mail->execute();
        $count = $verif_mail->rowCount();
        if($count == 1){

            echo"mail deja utilisé";
        }else{
            //partie insertion
            //preparation de la requete
            $requete_inscription = $bdd->prepare("INSERT INTO utilisateur(name, password, mail) VALUES ('".$name."','".$password."','".$mail."');");
            //execution de la requete
            $requete_inscription->execute();
            //si il y a pas d'information ou manque des information
            header('Location: connexion.php');

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
    <link rel="stylesheet" href="inscription.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        
        <div class="formulaire">
            <p>Inscription</p>
            <form action="inscription.php" method="POST">
                
                <input type="name" id="name" name="name" placeholder="name">
                <input type="mail" id="mail" name="mail" placeholder="mail">
                <input type="password" id="password" name="password" placeholder="password">
                <input type="submit"  name="envoi">

            </form>
            <div>

            </div>
        </div>
        
    </div>
    
</body>
</html>