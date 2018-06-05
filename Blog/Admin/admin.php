<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Page Admin</title>
    <link href="blogAdmin.css" rel="stylesheet" />
    </head>
    <body>
        <h1>Content de vous revoir Admin !</h1>
        <h2>Vos derniers billets du blog :</h2>
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


    // On récupère les 5 derniers billets

    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

    while ($donnees = $req->fetch()) {
      ?>
      <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['titre']); ?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
            <em> id = <?php echo nl2br(htmlspecialchars($donnees['id'])); ?> </em>
        </h3>
        <p>
        <?php
        // On affiche le contenu du billet
        echo nl2br(htmlspecialchars($donnees['contenu']));
        ?>
        <br />
        <em><a href="modifierArticle.php?billet=<?php echo $donnees['id']; ?>">Modifier</a></em>
        <em><a href="supprimerArticle_post.php?billet=<?php echo $donnees['id']; ?>">Supprimer</a></em>
        </p>
    </div>
    <?php

    } // Fin de la boucle des billets
    $req->closeCursor();
    ?>
      </br> <h2>Voulez vous :</h2> </br>
      <em><a href="ajouterArticle.php">- Ajouter un article </a></em> </br> </br>
      <em><a href="http://localhost/blog/index.php">- Retourner au blog </a></em>
    </body>
    </html>
