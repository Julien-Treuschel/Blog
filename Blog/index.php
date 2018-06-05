<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    <link href="blog.css" rel="stylesheet" />
    </head>
    <body>
        <h1>Mon blog !</h1>
        <h2> Derniers billets du blog :</h2>
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

$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 10');

while ($donnees = $req->fetch()) {
  ?>
  <div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php

} // Fin de la boucle des billets
$req->closeCursor();
?>

</br> <h2>Vous etes Admin ? :</h2> </br>
<em><a href="http://localhost/blog/admin/admin.php">- Espace admin </a></em>

</body>

</html>
