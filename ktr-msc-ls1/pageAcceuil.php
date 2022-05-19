<?php
 
  
  
  $personne = $_SESSION['ident'];
 
  
  $avatarURL = "images/avatar_def.png";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <title>Page à accès contrôlé</title>
    <link rel="stylesheet" type="text/css" href="style_authent.css" />
  </head>
<body>
<header>
<a href="logout.php">Se déconnecter</a>   <a href="formUpload.php">Changer d'avatar</a>
<?php
echo "<br><img class=\"avatar\" src=\"$avatarURL\" />";
?>
<h1>

<?php

echo "<br>Bienvenue sur votre compte {$personne->nam} ";
?>

</h1>
</header>

 
<div id="content">

    <h3> Ajouter une nouvelle carte de visite : <h3>
    <form method="POST" action="">
 <fieldset>
 
   <label for="nam">Nom :</label>
   <input type="text" name="nam" id="nam" autofocus/>
   <label for="nameCompany">nom de la compagnie :</label>
   <input type="text" name="nameCompany" id="nameCompany" autofocus/>
   <label for="email">email :</label>
   <input type="text" name="email" id="email" required="required" autofocus/>
   <label for="telephone">telephone :</label>
   <input type="text" name="telephone" id="telephone"  autofocus/>
   <button type="submit" name="valid">OK</button>

 </fieldset>
</form>


</div>

<?php

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8;port=3307','root', 'root');
    }catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    $lo = $personne->login;
    
    $requete = $bdd->prepare("SELECT * from users where login=?");

    $requete->execute(array($lo));
    $d = $requete->fetch();
   
    $i = $d['id'];
  

    $nam= $_POST['nam'];
    
    $nameCompany = $_POST['nameCompany'];

    $telephone = $_POST['telephone'];

    $email = $_POST['email'];
  
    $sql="INSERT INTO card (id_user,nam, nameCompany, email, telephone) VALUES(?,?,?,?,?)";
  
    if (isset($nam) AND isset($nameCompany) AND isset($email) AND isset($telephone)){
      
      $stmt = $bdd->prepare($sql);
    
      $stmt->execute(array($i, $nam,$nameCompany,$email,$telephone));
    }
 
    
    $res = $stmt->rowCount();
  
    if ($res==1){
      require("cardCreateOK.php");
     
  } else{
  
     echo "la carte n'a pas été crée";
     
  }
  ?>
  

  <h1> voici la liste de vos cartes </h1>

  <?php
    $reponse = $bdd->prepare("SELECT * from card where id_user=:i");
    $reponse->bindValue(':i',$i);
    $reponse->execute();
    $res = $reponse->rowCount();
  
    ?>

    <div>
    <table border= 1> 
        <?php
        
         while($donnees = $reponse->fetch()){
         
            ?>
            <tr>
                <td> <?php echo $donnees['nam']; ?> </td>
                <td> <?php echo $donnees['nameCompany']; ?> </td>
                <td> <?php echo $donnees['email']; ?> </td>
                <td> <?php echo $donnees['telephone']; ?> </td>
            </tr>
            <?php
            }
        ?>
        </table>
        </div>

</body>
</html>