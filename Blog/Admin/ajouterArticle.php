<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Page Admin</title>
        <link href="blogAdmin.css" rel="stylesheet" />
    </head>
    <body>
        <h1>Bienvenue sur la page d'ajout d'article !</h1>

        <form action="ajouterArticle_post.php" method="post" >

          <p>
            Veuillez renseigner le titre de l'article :
            <br/> <br/>
          </p>
          <input type="text" name="titre" />
          <br/> <br/>

          <p>
            Veuillez renseigner le contenu de l'article :
            <br/> <br/>
          </p>
          <textarea name="contenu" rows="8" cols="45"> </textarea>
          <br/> <br/>

          <input type="submit" value="Envoyer" />
        </form>
      </body>
</html>
