<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog_db;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

//$id_billet = htmlspecialchars($_GET['billet']);
$id_billet = htmlspecialchars($_POST['billet']);
$auteur = htmlspecialchars($_POST['auteur']);
$commentaire = htmlspecialchars($_POST['commentaire']);
$date_commentaire = date("Y-m-d H:i:s");

// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO commentaires (id_billet,auteur, commentaire,date_commentaire) VALUES(:id_billet, :auteur, :commentaire, :date_commentaire)');
$req->execute(array(
  'id_billet' => $id_billet,
  'auteur' => $auteur,
  'commentaire' => $commentaire,
  'date_commentaire' => $date_commentaire
));

// Redirection du visiteur
header('Location: index.php');
?>
