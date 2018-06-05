<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    <link href="blog.css" rel="stylesheet" />
    </head>
    <body>
        <h1>Mon blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>
<?php
// Connexion à la base de données
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=blog_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrete tout
    die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));

$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
    <em><a href="commentaires_post.php?billet=<?php echo $donnees['id']; ?>"></a></em>
    <?php $id_page = $donnees['id'];  ?>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');

$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch()) {
  ?>
  <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>

  <p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>

  <?php
} // Fin de la boucle des commentaires

$req->closeCursor();


// partie visiteur, post de commentaire
?>
</br> </br>
<h2> Envie de commenter ? </h2>
<form action="commentaires_post.php" method="post" >

<p>
   Pseudo :
    </p>
   <input type="text" name="auteur" />
<br/>

<p>
   Message :
   </p>
   <textarea name="commentaire" rows="8" cols="45">
	</textarea>
<br/> <br/>

<input type="text" name="billet" style="display:none" value="<?php echo $id_page; ?>" />

<input type="submit" value="Envoyer" />
<br/> <br/>
</form>
<br/> <br/>



</body>

</html>
