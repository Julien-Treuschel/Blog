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

$titre = htmlspecialchars($_POST['titre']);
$contenu = htmlspecialchars($_POST['contenu']);
$date_Article = date("Y-m-d H:i:s");
try
{
$req = $bdd->prepare('INSERT INTO billets(titre, contenu, date_creation) VALUES(:titre, :contenu, :date_creation)');
$req->execute(array(
    'titre' => $titre,
    'contenu' => $contenu,
    'date_creation' => $date_Article
));

echo 'Votre article à bien été ajouté !';

}
catch(Exception $e)
{
    ?>
    <p>Echec de l'oppération, votre article n'à pas pu etre ajouter </p>
    <p>Si vous voulez ajouter d'autres articles, <a href="ajouterArticle.php">cliquez ici</a> </p>
    <p>Si vous voulez vous rendre à la page d'acceuil, <a href="admin.php">cliquez ici</a> </p>
   	<?php die('Erreur : '.$e->getMessage());
}
?>
<p>Si vous voulez ajouter d'autres articles, <a href="ajouterArticle.php">cliquez ici</a> </p>
<p>Si vous voulez vous rendre à la page d'acceuil, <a href="admin.php">cliquez ici</a> </p>
