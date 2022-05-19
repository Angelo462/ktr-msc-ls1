<?php

require_once("db_params.php");
require_once("DataLayer.class.php");

$password = $_POST['password'];

$nam= $_POST['nam'];

$login = $_POST['login'];

$nameCompany = $_POST['nameCompany'];

$telephone = $_POST['telephone'];

$email = $_POST['email'];

$data = new DataLayer();

$res = $data->createUser($nam, $nameCompany, $email, $telephone, $login, $password);

if ($res==1){
    require("pageCreateOK.php"); 
} else{
   $erreurCreation = TRUE; 
   require("pageRegister.php");
   
   exit();
}

?>



