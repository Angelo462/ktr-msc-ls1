<?php
  const METHOD = INPUT_POST;
  session_name("MaSession");
  session_start();
   
  if (! isset($_SESSION['ident'])){
    $person = NULL;
    
	   $login = filter_input(METHOD, 'login', FILTER_SANITIZE_STRING);
 
	   if ($login === NULL)
   	  $login = '';
	   if ($login != '') {
	     $password = filter_input(METHOD, 'password', FILTER_SANITIZE_STRING);
     
       $person = $data->authentifier($login, $password);
      
     }
     
     if ($person === NULL){

       require('pageLogin.php');
       $_SESSION['echec'] = TRUE;
       exit();
     } else {
       
       $_SESSION['ident'] = $person;
       unset($_SESSION['echec']);
      
     }
   }
?>