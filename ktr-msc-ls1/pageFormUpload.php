<?php
 /*
  */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
 <meta charset="UTF-8" />
 <title>Course cycliste, avatar</title>
 <link rel="stylesheet" href="style/styleEquipe.css" />

<script src="js/fetchUtils.js"></script>
<script src="js/formUpload.js"></script>


</head>
<body>
  <h1></h1>
  <form name="upload_image" action="uploadAvatar.php" method = "post" enctype="multipart/form-data">
   <fieldset>
      <legend>Nouvel avatar</legend>
      <input type="file" name="image" required="required"/>
      <button type="submit" name="valid" value="envoyer">Envoyer</button>
    </fieldset>
  </form>
  <div id="message"></div>
  <footer><a href="index.php">Page d'accueil</a></footer>
 </body>