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

try
{
    $req = $bdd->prepare('DELETE FROM billets WHERE id = :billet') or die(print_r($bdd->errorInfo()));
    $req->execute(array(
        'billet' => $id_billet
    ));
echo 'Le billet a bien été supprimer !';
}
catch(Exception $e)
{
    ?>
    <p>Echec de l'oppération, le billet demander n'a pas pu etre supprimer </p>
    <p>Si vous voulez vous rendre à la page d'acceuil, <a href="admin.php">cliquez ici</a> </p>
   	<?php die('Erreur : '.$e->getMessage());
}
?>
<p>Si vous voulez vous rendre à la page d'acceuil, <a href="admin.php">cliquez ici</a> </p>
