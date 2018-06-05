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

$titreAticle = $_POST['titreAticle'];
$contenuArticle = $_POST['contenuArticle'];
$billet = $_POST['billet'];

try
{
    $req = $bdd->prepare('UPDATE billets SET titre = :titreAticle, contenu = :contenuArticle WHERE id = :billet');
    $req->execute(array(
        'titreAticle' => $titreAticle,
        'contenuArticle' => $contenuArticle,
        'billet' => $billet
    ));
echo 'Votre article a bien été modifier !';
}
catch(Exception $e)
{
    ?>
    <p>Echec de l'oppération, l'article demander n'a pas pu etre modifier </p>
    <p>Si vous voulez vous rendre à la page d'acceuil, <a href="admin.php">cliquez ici</a> </p>
   	<?php die('Erreur : '.$e->getMessage());
}
?>
<p>Si vous voulez vous rendre à la page d'acceuil, <a href="admin.php">cliquez ici</a> </p>
