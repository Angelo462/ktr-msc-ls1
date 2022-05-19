<?php

require_once('db_params.php');
Class DataLayer{
    private $connexion;

    public function __construct(){
     
         try {
        $this->connexion =new PDO('mysql:host=localhost;dbname=test;charset=utf8;port=3307','root', 'root');
        
      ;
       } catch(PDOException $e) {
           die('Erreur : ' . $e->getMessage());
       }
    }

    function authentifier($login, $password) {
      $sql ="SELECT login, nameCompany, nam
            FROM users
            WHERE login =? and password =?";
     
      $stmt = $this->connexion->prepare($sql);
      $stmt->execute(array($login,$password));
   
      if ($res = $stmt->fetch()){
        
        return new Information($res['login'], $res['nameCompany'], $res['nam']);
      }
        return NULL;
      
    }
       
function createUser($nam, $nameCompany, $email, $telephone, $login, $password){
  
  $sql="INSERT INTO users(nam, nameCompany, email, telephone, login, password) VALUES(?,?,?,?,?,?)";
  $stmt = $this->connexion->prepare(array($sql));
    
    if (isset($nam) AND isset($nameCompany) AND isset($email) AND isset($telephone) AND isset($login)){
      $stmt = $this->connexion->prepare($sql);
      $stmt->execute(array($nam,$nameCompany,$email,$telephone,$login,$password));
    
    }
    $res = $stmt->rowCount();
     
    return $res;
    
  }

  function saveDate($nam, $nameCompany, $email, $telephone){
    $sql="INSERT INTO card (nam, nameCompany, email, telephone) VALUES(?,?,?,?)";
    $stmt = $this->connexion->prepare(array($sql));
    if (isset($nam) AND isset($nameCompany) AND isset($email) AND isset($telephone)){
      $stmt = $this->connexion->prepare($sql);
      $stmt->execute(array($nam,$nameCompany,$email,$telephone));
      var_dump($stmt->rowCount());
    }
    $res = $stmt->rowCount();
    
    if ($res==1){
      require("cardCreateOK.php"); 
  } else{
     $erreurCreationCard = TRUE; 
     require("pageAccueil.php");
     exit();
  }
  }

}
?>