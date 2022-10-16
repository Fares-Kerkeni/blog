<?php
    session_start();
    require('db.php');
    if(isset($_POST['envoi'])){
        if (!isset($_POST['post_blog'])){
            echo 'vous avez pas remplis tous les champs';
        }else{
            // pour que l'utilisateur de rentre pas de l'html
            $post_blog = htmlspecialchars($_POST['post_blog']);
            $id_utilisateur = $_SESSION['id_utilisateur'];
             //partie insertion
            //preparation de la requete
            $requete_blog = $bdd->prepare("INSERT INTO post(id_utilisateur,text) VALUES ('".$id_utilisateur."','".$post_blog."');");

            //execution de la requete
            $requete_blog->execute();
            //si il y a pas d'information ou manque des information
            header('Location: blog.php');
            
            
            
            
            }
        }
        if(isset($_POST['sup'])){
            
                // pour que l'utilisateur de rentre pas de l'html
                $id_post = htmlspecialchars($_POST['id_post']);
                
                 //partie insertion
                //preparation de la requete
                $delete_poste = $bdd->prepare("DELETE FROM post WHERE id_post = '".$id_post."'");    
                //execution de la requete
                $delete_poste->execute();
                //si il y a pas d'information ou manque des information
        }
            
        if(isset($_POST['message_com'])){
            // pour que l'utilisateur de rentre pas de l'html
            $id_post = htmlspecialchars($_POST['id_post']);
          
            $com = htmlspecialchars($_POST['com']);
             //partie insertion
            //preparation de la requete
            $requete_com = $bdd->prepare("INSERT INTO com(id_post,com) VALUES ('".$id_post."','".$com."');");
            
            //execution de la requete
            $requete_com->execute();
            //si il y a pas d'information ou manque des information
           
                
                
                
                
        }
            
    
    
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="blog.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="container_popup" id="myModal">
            <div class="modal-content">
                <div class="container_content">
                    <div class="title">
                        
                        <span class="close">&times;</span>
                    </div>
                    <div class="input">

                        <div class="text">Ajouter un poste</div>

                        <form action="blog.php" method="POST">
                            <div></div>
                            <input type="text"  name="post_blog" class="post_blog">
                            <input type="submit"  name="envoi">
                        </form>
                    </div>
                    
                </div>
               
                
            </div>

        </div>
        <div class="header">
            <div class="name"><?php echo $_SESSION['name'];?>
            </div>
            <div class="ajouter">
                <img src="plus.png" alt="" id="myBtn">
            </div>
            <img src="deco.png" alt="">

        </div>
        
        <div class="container_blog">
            <div class="all_post">
                <div class="post">
                    Tous les postes
                </div>
                <div class="affichage des postes">
                <?php 
                    $select_postes_user = $bdd->prepare('SELECT * FROM post INNER JOIN utilisateur ON post.id_utilisateur = utilisateur.id_utilisateur');
                    $select_postes_user->execute();
                    $donnees_select_postes_user = $select_postes_user->fetchAll(PDO::FETCH_ASSOC); 

                    $select_commentaires_user = $bdd->prepare('SELECT * FROM com ');
                    $select_commentaires_user->execute();
                    $donnees_select_commentaires_user = $select_commentaires_user->fetchAll(PDO::FETCH_ASSOC); 
                    // afficher tous les utilisateurs du site, et on peut filtrer avec la barre de recherche
                    // foreach($donnees_select_commentaires_user as $donnee_select_commentaire_user): 
                    
                    // afficher tous les utilisateurs du site, et on peut filtrer avec la barre de recherche
                    foreach($donnees_select_postes_user as $donnee_select_poste_user): 
                       
      
                ?>
              
                <p><?= $donnee_select_poste_user["id_utilisateur"]?></p>
                        
                <div><?= $donnee_select_poste_user["text"]?></div>
                <?php 
                    if($_SESSION['id_utilisateur'] == $donnee_select_poste_user["id_utilisateur"]){

                ?>
                <form action="blog.php" method="POST">
                    <input type="hidden" name="id_post" value="<?= $donnee_select_poste_user["id_post"]?>">
                    <input type="submit" id="name" name="sup" value="sup">
                </form>
               
                <?php }?>
                <form action="blog.php" method="POST">
                    <input type="hidden" name="id_post" value="<?= $donnee_select_poste_user["id_post"]?>">
                    
                    <input type="text"  name="com" placeholder="com">
                    <input type="submit"  name="message_com" value="message_com">
                </form>
                <?php 
     
                    endforeach; 
                ?>
               
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
</body>
</html>