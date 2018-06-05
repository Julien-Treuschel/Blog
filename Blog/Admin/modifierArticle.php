<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Page Admin</title>
        <link href="blogAdmin.css" rel="stylesheet" />
    </head>
    <body>
        <h1>Bienvenue sur la page de modification d'article !</h1>

        <?php

            try
            {
                // On se connecte à MySQL
                $bdd = new PDO('mysql:host=localhost;dbname=blog_db;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                // En cas d'erreur, on affiche un message
                die('Erreur : '.$e->getMessage());
            }

$id_billet = htmlspecialchars($_GET['billet']);

$req = $bdd->prepare('SELECT titre, contenu FROM billets WHERE id = :billet')or die(print_r($bdd->errorInfo()));
$req->execute(array(
    'billet' => $id_billet
));

while ($donnees = $req->fetch())
    {
      $titreArticle = $donnees['titre'];
      $contenuArticle = $donnees['contenu'];

    }
    $req->closeCursor();
 ?>

        <form action="modifierArticle_post.php" method="post" >

          <p>
            Veuillez renseigner le titre de l'article :
            <br/> <br/>
          </p>
          <input type="text" name="titreAticle" value="<?php echo $titreArticle; ?>" />
          <br/> <br/>

          <p>
            Veuillez renseigner le contenu de l'article à modifier:
            <br/> <br/>
          </p>
          <textarea name="contenuArticle" rows="8" cols="45" > <?php echo $contenuArticle; ?> </textarea>
          <br/> <br/>

          <input type="text" name="billet" style="display:none" value="<?php echo $id_billet; ?>" />

          <input type="submit" value="Envoyer" />
        </form>
      </body>
</html>
